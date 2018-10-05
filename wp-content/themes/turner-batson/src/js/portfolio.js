import { initFeaturedSlider } from './modules/slider';
import loadMore from './modules/loadMore';

initFeaturedSlider('[data-slider="featured"]');

/* global loadmore */
loadMore('[data-load-more="portfolio"]', loadmore);
