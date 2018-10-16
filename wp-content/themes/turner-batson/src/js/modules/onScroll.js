import fromTop from './fromTop';
import withDefault from './withDefault';

export function hide(buffer, el) {
  if (window.scrollY > buffer) {
    el.classList.add('opacity-0');
    el.classList.remove('opacity-100');
  } else {
    el.classList.add('opacity-100');
    el.classList.remove('opacity-0');
  }
}

export function show(buffer, el) {
  if (window.scrollY > buffer) {
    el.classList.add('opacity-100');
    el.classList.remove('opacity-0');
  } else {
    el.classList.add('opacity-0');
    el.classList.remove('opacity-100');
  }
}

export function grow(el) {
  const og = {
    height: el.offsetHeight,
    fromTop: fromTop(el),
    buffer: parseFloat(withDefault('1', 'growBuffer', el.dataset)),
  };

  el.style.height = '0px';

  return function() {
    og.fromTop = fromTop(el);
    const buffer = window.innerHeight * og.buffer;
    const full = window.innerHeight - buffer - 100;
    const fromBuffer = og.fromTop - buffer;
    const isVisible = og.fromTop - window.innerHeight < -100;
    const isAbove = fromBuffer < 0;

    requestAnimationFrame(() => {
      if (isAbove) {
        el.style.height = `${og.height}px`;
      } else if (isVisible) {
        const percent = 1 - fromBuffer / full;
        el.style.height = `${percent * og.height}px`;
      } else {
        el.style.height = '0px';
      }
    });
    return og;
  };
}
