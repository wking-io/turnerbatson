import runAndListen from './modules/runAndListen';
import { show } from './modules/onScroll';
import { initFeaturedSlider } from './modules/slider';
import { dom } from './modules/dom';

const hero = dom('#hero');
const navName = dom('#masthead .branding');
runAndListen(() => show(hero.offsetHeight, navName), 'scroll', window);

initFeaturedSlider('[data-slider="featured"]');
