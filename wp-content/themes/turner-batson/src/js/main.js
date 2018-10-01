import '../scss/main.scss';
import './modules/fonts';

import compose from './modules/compose';
import runAndListen from './modules/runAndListen';
import { hide } from './modules/onScroll';
import { toggleAttr } from './modules/attr';
import { toggleClass } from './modules/classlist';
import { dom } from './modules/dom';
import { wrapEvent, eventOn } from './modules/event';

const nav = dom('#masthead');
const navName = dom('.page-name');
const navToggle = dom('.menu-toggle');

runAndListen(() => hide(10, navName), 'scroll', window);

// Toggle Nav
const toggleNavOnEvent = wrapEvent(toggleClass, ['nav--open', nav]);
const toggleExpandedOnEvent = wrapEvent(toggleAttr, [
  'aria-expanded',
  navToggle,
]);
eventOn('click', compose(toggleExpandedOnEvent, toggleNavOnEvent), navToggle);
