import '../scss/main.scss';
import './modules/fonts';

import runAndListen from './modules/runAndListen';
import changeBySection from './modules/changeBySection';

const sectionElems = Array.from(document.querySelectorAll('[data-section]'));
const nav = document.getElementById('nav-base');

runAndListen(changeBySection(nav, sectionElems), 'scroll', window);
