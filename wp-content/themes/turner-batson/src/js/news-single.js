import replaceUrl from './modules/replaceUrl';
import { domAll } from './modules/dom';

const links = domAll('.social-share .zoom-social_icons-list__link');
links.forEach(replaceUrl);
