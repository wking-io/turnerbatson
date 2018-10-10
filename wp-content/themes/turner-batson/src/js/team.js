import { domAll } from './modules/dom';
import { toggleAllDrawer } from './modules/drawer';

// Drawers
const drawerBtns = domAll('[data-drawer-action-special]');
const drawers = domAll('[data-drawer-special]');
drawerBtns.forEach(function(btn) {
  const wrapper = document.getElementById(btn.getAttribute('aria-controls'));
  btn.addEventListener('click', toggleAllDrawer(wrapper, drawers));
});
