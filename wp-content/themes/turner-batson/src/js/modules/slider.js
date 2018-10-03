import $ from 'jquery';
import 'slick-carousel';
import { domAll } from './dom';
import withDefault from './withDefault';

const goTo = (el, context) => {
  const index = withDefault(false, 'slideTo', el.dataset);
  if (false === index) {
    console.log('No slideTo data prop was found for this element.');
  } else {
    $(`${context} .slider`).slick('slickGoTo', index);
  }
  return el;
};

function updateWhenIndex(i, buttons) {
  buttons.forEach(button => {
    const index = withDefault(false, 'slideTo', button.dataset);
    if (false !== index && i === parseInt(index)) {
      button.parentElement.classList.add('active-item');
    } else {
      button.parentElement.classList.remove('active-item');
    }
  });
}

function fancyNav(context, buttons) {
  buttons.forEach(button =>
    button.addEventListener('click', () => goTo(button, context))
  );

  // Update the nav items with active class on change
  $(`${context} .slider`).on(
    'beforeChange',
    (event, slick, currentSlide, nextSlide) =>
      updateWhenIndex(nextSlide, buttons)
  );
}

export function initFeaturedSlider(context) {
  const buttons = domAll('[data-slider-button="featured"]', context);

  // Update the nav items with active class on init
  $(`${context} .slider`).on('init', () => {
    updateWhenIndex(0, buttons);
  });

  // Update the nav items with active class on init
  $(`${context} .slider`).on('reInit', () => {
    updateWhenIndex(0, buttons);
  });

  $(`${context} .slider`).slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 7500,
    speed: 300,
    fade: true,
    cssEase: 'linear',
    rows: 0,
  });

  fancyNav(context, buttons);
}

function unslickWhen(cond, slider, settings) {
  if (cond()) {
    if (slider.hasClass('slick-initialized')) {
      slider.slick('unslick');
    }
  } else if (!slider.hasClass('slick-initialized')) {
    slider.slick(settings);
  }
}

export function initLatestSlider(context) {
  const $slickSlider = $(`${context} .slider`);

  const settings = {
    infinite: true,
    slidesToShow: 2,
    variableWidth: true,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
  };

  unslickWhen(() => $(window).width() < 768, $slickSlider, settings);

  // reslick only if it's not slick()
  $(window).on('resize', () => {
    unslickWhen(() => $(window).width() < 768, $slickSlider, settings);
  });

  $(`${context} [data-slider-prev]`).click(() =>
    $(`${context} .slider`).slick('slickPrev')
  );
  $(`${context} [data-slider-next]`).click(() =>
    $(`${context} .slider`).slick('slickNext')
  );
}

export function destroySlider(context) {
  $(`${context} .slider`).slick('unslick');
}
