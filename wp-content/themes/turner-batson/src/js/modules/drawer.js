import { attrToBool } from './attr';
import { dom } from './dom';

function findParentDrawer(el) {
  if (el === document.body) {
    return false;
  }

  return el.parentElement.hasAttribute('data-drawer-wrapper')
    ? el.parentElement
    : findParentDrawer(el.parentElement);
}

export function toggleDrawer(wrapper) {
  return function(e) {
    toggleDrawerAttr(e.target, wrapper);
    setDrawerHeight(wrapper);
    return e;
  };
}

function toggleDrawerAttr(btn, wrapper) {
  const isExpanded = attrToBool(wrapper, 'data-drawer-expanded');
  wrapper.setAttribute('data-drawer-expanded', !isExpanded);
  wrapper.classList.toggle('drawer--open');
  btn.setAttribute('aria-expanded', !isExpanded);
  return wrapper;
}

export function setDrawerHeight(wrapper) {
  wrapper.style.height = attrToBool(wrapper, 'data-drawer-expanded')
    ? wrapper.querySelector('[data-drawer-full]').offsetHeight + 'px'
    : wrapper.querySelector('[data-drawer-visible]').offsetHeight + 'px';

  const parentDrawer = findParentDrawer(wrapper);
  if (parentDrawer) {
    setDrawerHeight(parentDrawer);
  }
}

function toggleAllDrawerAttr(btn, wrapper, wrappers) {
  const isExpanded = attrToBool(wrapper, 'data-drawer-expanded');

  wrapper.parentElement.classList.remove(
    'team-container--open',
    'team-container--open-left',
    'team-container--open-right'
  );

  if (!isExpanded) {
    wrappers.forEach(wrap => {
      const wrapButton = dom('[data-drawer-action-special]', wrap);
      wrap.setAttribute('data-drawer-expanded', false);
      wrap.classList.remove('drawer--open');
      wrapButton.setAttribute('aria-expanded', false);
    });
    wrapper.parentElement.classList.add('team-container--open');
    if (wrapper.classList.contains('team-item--right')) {
      wrapper.parentElement.classList.add('team-container--open-right');
    } else {
      wrapper.parentElement.classList.add('team-container--open-left');
    }
  }

  wrapper.setAttribute('data-drawer-expanded', !isExpanded);
  wrapper.classList.toggle('drawer--open');
  btn.setAttribute('aria-expanded', !isExpanded);
  return wrapper;
}

export function toggleAllDrawer(wrapper, wrappers) {
  return function(e) {
    toggleAllDrawerAttr(e.target, wrapper, wrappers);
  };
}
