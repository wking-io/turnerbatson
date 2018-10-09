import updateNav from './modules/updateNav';
import { dom } from './modules/dom';
import { initProjectSlider } from './modules/slider';

const nav = dom('#masthead');
updateNav(nav, 'light');

initProjectSlider('[data-slider="project"]');
