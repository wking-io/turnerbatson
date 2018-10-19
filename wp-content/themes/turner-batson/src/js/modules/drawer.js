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

  if (isExpanded) {
    btn.innerHTML = btn.getAttribute('data-open-text');
  } else {
    btn.innerHTML = btn.getAttribute('data-close-text');
  }

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
  const currentBio = dom('.team-bio', wrapper);
  const currentSpacer = dom('.team-spacer', wrapper);

  wrapper.parentElement.classList.remove(
    'team-container--open',
    'team-container--open-left',
    'team-container--open-right'
  );

  if (!isExpanded) {
    wrappers.forEach(wrap => {
      const spacer = dom('.team-spacer', wrap);
      const wrapButton = dom('[data-drawer-action-special]', wrap);
      wrap.setAttribute('data-drawer-expanded', false);
      wrap.classList.remove('drawer--open');
      wrapButton.setAttribute('aria-expanded', false);
      spacer.style.height = '0px';
    });
    wrapper.parentElement.classList.add('team-container--open');
    currentSpacer.style.height = `${currentBio.offsetHeight + 32}px`;
  } else {
    currentSpacer.style.height = '0px';
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
