import replaceUrl from './modules/replaceUrl';
import { domAll } from './modules/dom';
import { initNewsSlider } from './modules/slider';

const links = domAll('.social-share .zoom-social_icons-list__link');
links.forEach(replaceUrl);

initNewsSlider('[data-slider="news"]');