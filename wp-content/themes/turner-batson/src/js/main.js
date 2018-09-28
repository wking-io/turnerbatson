import '../scss/main.scss';
import './modules/fonts';

import compose from './modules/compose';
import runAndListen from './modules/runAndListen';
import changeBySection from './modules/changeBySection';
import { toggleAttr } from './modules/attr';
import { toggleClass } from './modules/classlist';
import { dom, domAll } from './modules/dom';
import { wrapEvent, eventOn } from './modules/event';

const sectionElems = domAll('[data-section]');
const nav = dom('#masthead');
const navToggle = dom('.menu-toggle');

runAndListen(changeBySection(nav, sectionElems), 'scroll', window);

// Toggle Nav
const toggleNavOnEvent = wrapEvent(toggleClass, ['nav--open', nav]);
const toggleExpandedOnEvent = wrapEvent(toggleAttr, ['aria-expanded', navToggle]);
eventOn('click', compose(toggleExpandedOnEvent, toggleNavOnEvent), navToggle);