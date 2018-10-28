import runAndListen from './modules/runAndListen';
import { show, grow } from './modules/onScroll';
import { initHomeSlider, initLatestSlider } from './modules/slider';
import { dom, domAll } from './modules/dom';
import withDefault from './modules/withDefault';
import fromTop from './modules/fromTop';

const hero = dom('#hero');
const navName = dom('#masthead .branding');
if (window.innerWidth > 992) {
  runAndListen(() => show(hero.offsetHeight, navName), 'scroll', window);
}

initHomeSlider('[data-slider="home"]');
initLatestSlider('[data-slider="latest"]');

const growers = domAll('[data-grow]').map(grow);
growers.forEach(grower => runAndListen(grower, 'scroll', window));

const logo = dom('[data-sticky]');
const nav = dom('[data-sticky-ref]');
const name = dom('.branding-name');

export function stick(el, ref, name) {
  return function() {
    requestAnimationFrame(() => {
      const isReady =
        fromTop(ref) <= parseInt(withDefault('0', 'stickyBuffer', el.dataset));

      if (isReady) {
        const top = withDefault('auto', 'stickyTop', el.dataset);
        const left = withDefault('auto', 'stickyLeft', el.dataset);

        el.style.position = 'fixed';
        el.style.top = top;
        el.style.left = left;

        const opacity = 1 - (96 - fromTop(name)) / 20;
        name.style.opacity = opacity;

        const fromTopFixed = fromTop(ref) + 148;
        const fromFinal = (168 - fromTopFixed) / 168;
        el.style.top = '20px';
        el.style.left = '20px';
        if (fromFinal >= 1) {
          el.style.width = '32px';
          el.classList.add('opacity-0');
        } else {
          el.style.width = `${48 - fromFinal * 16}px`;
          el.classList.add('opacity-100');
        }
      } else {
        el.style.position = 'absolute';
        el.style.top = '0px';
        el.style.left = '0px';
        el.style.width = '48px';
        name.style.opacity = '1';
      }
    });
  };
}

runAndListen(stick(logo, nav, name), 'scroll', window);

const tagline = dom('.culture-info');
const wrapper = dom('.culture-bg');

function moveTagline(tagline, wrapper) {
  return function() {
    if (window.innerWidth > 992) {
      requestAnimationFrame(() => {
        const wrapperTop = fromTop(wrapper);
        const wrapperCenter = wrapperTop + wrapper.offsetHeight / 2;
        const windowCenter = window.innerHeight / 2;
        const isVisible = wrapperTop < window.innerHeight;
        const isAbove = wrapperCenter < windowCenter;
        const base = 35;

        if (isAbove) {
          tagline.style.transform = `translateY(-${base}%)`;
        } else if (isVisible) {
          const percent = -(1 - wrapperCenter / windowCenter);
          tagline.style.transform = `translateY(-${base + base * percent}%)`;
        } else {
          tagline.style.transform = `translateY(-${base}%)`;
        }
      });
    }
  };
}

runAndListen(moveTagline(tagline, wrapper), 'scroll', window);

const quote = dom('.culture-testimonial');

function moveQuote(quote) {
  return function() {
    if (window.innerWidth > 992) {
      requestAnimationFrame(() => {
        const quoteTop = fromTop(quote);
        const buffer = window.innerHeight * 0.75;
        const full = window.innerHeight - buffer - 100;
        const fromBuffer = quoteTop - buffer;
        const isVisible = quoteTop - window.innerHeight < -100;
        const isAbove = fromBuffer < 0;
        const base = 40;
        const blurBase = 5;

        if (isAbove) {
          quote.style.filter = 'blur(0px)';
          quote.style.opacity = '1';
          quote.style.transform = 'translateX(0)';
        } else if (isVisible) {
          const percent = 1 - fromBuffer / full;
          quote.style.transform = `translateX(${base - base * percent}px)`;
          quote.style.opacity = `${1 * percent}`;
          quote.style.filter = `blur(${blurBase - blurBase * percent}px)`;
        } else {
          quote.style.filter = 'blur(5px)';
          quote.style.opacity = '0';
          quote.style.transform = 'translateX(20px)';
        }
      });
    }
  };
}

runAndListen(moveQuote(quote), 'scroll', window);
