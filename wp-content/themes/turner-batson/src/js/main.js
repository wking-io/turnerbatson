import '../scss/main.scss';
import './modules/fonts';

import compose from './modules/compose';
import runAndListen from './modules/runAndListen';
import { hide } from './modules/onScroll';
import { toggleAttr } from './modules/attr';
import { toggleClass } from './modules/classlist';
import { dom, domAll } from './modules/dom';
import { wrapEvent, eventOn } from './modules/event';
import { setDrawerHeight, toggleDrawer } from './modules/drawer';
import togglePopup from './modules/popup';

const nav = dom('#masthead');
const navName = dom('.page-name');
const navToggle = dom('.menu-toggle');
const nameToggle = dom('.name-toggle');

if (window.location.pathname !== '/') {
  runAndListen(() => hide(10, navName), 'scroll', window);
}

// Toggle Nav
const toggleNavOnEvent = wrapEvent(toggleClass, ['nav--open', nav]);
const toggleExpandedOnNav = wrapEvent(toggleAttr, [
  'aria-expanded',
  navToggle,
]);
const toggleExpandedOnName = wrapEvent(toggleAttr, [
  'aria-expanded',
  nameToggle,
]);
const menuPipeline = compose(toggleExpandedOnNav, toggleExpandedOnName, toggleNavOnEvent);
eventOn('click', menuPipeline, navToggle);
eventOn('click', menuPipeline, nameToggle);

// Popups
const popups = domAll('[data-popup-action]');
popups.forEach(function(btn) {
  btn.addEventListener('click', togglePopup);
});

// Drawers
const drawers = domAll('[data-drawer-action]');
drawers.forEach(function(btn) {
  const wrapper = document.getElementById(btn.getAttribute('aria-controls'));
  setDrawerHeight(wrapper);
  btn.addEventListener('click', toggleDrawer(wrapper));
});
