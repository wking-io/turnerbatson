import loadMore from './modules/loadMore';
import { dom } from './modules/dom';
import fromTop from './modules/fromTop';
import runAndListen from './modules/runAndListen';

/* global loadmore */
loadMore('[data-load-more="testimonial"]', loadmore);

const wrapper = dom('.testimonial-wrapper');

function stopAtBottom(wrapper) {
  const info = dom( '.testimonial-info', wrapper);
  const items = dom( '.testimonial-items', wrapper);

  return function() {
    const infoBreak = fromTop(info) + info.offsetHeight;
    const infoCenter = fromTop(info) + (info.offsetHeight / 2);
    const itemsBreak = fromTop(items) + items.offsetHeight - 96;
    const isDone = infoBreak >= itemsBreak;
    const isAbove = infoCenter > window.innerHeight / 2


    if (isAbove) {
      info.style.position = 'fixed';
      info.style.top = '50%';
      info.style.bottom = 'auto';
      info.style.transform = 'translateY(-50%)';
    } else if (isDone) {
      info.style.position = 'absolute';
      info.style.top = 'auto';
      info.style.bottom = '96px';
      info.style.transform = 'translateY(0)';
    } else {
      info.style.position = 'fixed';
      info.style.top = '50%';
      info.style.bottom = 'auto';
      info.style.transform = 'translateY(-50%)';
    }
  }
}

if (window.innerWidth >= 992) {
  runAndListen(stopAtBottom(wrapper), 'scroll', window);
}