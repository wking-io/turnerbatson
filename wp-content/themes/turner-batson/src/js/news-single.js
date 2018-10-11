import replaceUrl from './modules/replaceUrl';
import { domAll } from './modules/dom';

const links = domAll('[data-replace-link]');
links.forEach(replaceUrl);
