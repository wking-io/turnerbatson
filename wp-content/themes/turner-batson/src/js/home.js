import runAndListen from './modules/runAndListen';
import { show } from './modules/onScroll';
import { initHomeSlider, initLatestSlider } from './modules/slider';
import { dom } from './modules/dom';

const hero = dom('#hero');
const navName = dom('#masthead .branding');
runAndListen(() => show(hero.offsetHeight, navName), 'scroll', window);

initHomeSlider('[data-slider="home"]');
initLatestSlider('[data-slider="latest"]');
