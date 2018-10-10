import { attrToBool } from './attr';

function findParentDrawer(el) {
  if (el === document.body) {
    return false;
  }
  
  return el.parentElement.hasAttribute('data-drawer-wrapper') ? el.parentElement : findParentDrawer(el.parentElement)
}

export function toggleDrawer(wrapper) {
  return function(e) {
    toggleDrawerAttr(e.target, wrapper);
    setDrawerHeight(wrapper);
    return e;
  }
}

function toggleDrawerAttr(btn, wrapper) {
  const isExpanded = attrToBool(wrapper, "data-drawer-expanded");
  wrapper.setAttribute('data-drawer-expanded', !isExpanded);
  wrapper.classList.toggle('drawer--open');
  btn.setAttribute('aria-expanded', !isExpanded);
  return wrapper;
}

export function setDrawerHeight(wrapper) {
  wrapper.style.height = attrToBool(wrapper, "data-drawer-expanded") ? wrapper.querySelector('[data-drawer-full]').offsetHeight + 'px' : wrapper.querySelector('[data-drawer-visible]').offsetHeight + 'px';
  
  const parentDrawer = findParentDrawer(wrapper);
  if (parentDrawer) {
    setDrawerHeight(parentDrawer);
  }
}