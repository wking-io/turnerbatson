import runAndListen from './modules/runAndListen';
import { grow } from './modules/onScroll';
import { domAll } from './modules/dom';
import { toggleAllDrawer } from './modules/drawer';
import loadMore from './modules/loadMore';

// Drawers
const drawerBtns = domAll('[data-drawer-action-special]');
const drawers = domAll('[data-drawer-special]');
drawerBtns.forEach(function(btn) {
  const wrapper = document.getElementById(btn.getAttribute('aria-controls'));
  btn.addEventListener('click', toggleAllDrawer(wrapper, drawers));
});

/* global loadmore */
loadMore('[data-load-more="team"]', loadmore);
