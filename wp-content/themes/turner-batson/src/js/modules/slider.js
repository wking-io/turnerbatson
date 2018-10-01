import $ from 'jquery';
import 'slick-carousel';
import { domAll } from './dom';
import withDefault from './withDefault';

// export function initTumblrSlider(context) {
//   const loading = status => e => {
//     classList(status, 'loading', e.target);
//   };

//   $(`${context} .slider`).on('init', loading('remove'));
//   $(`${context} .slider`).on('reInit', loading('remove'));
//   $(`${context} .slider`).on('destroy', loading('add'));

//   $(`${context} .slider`).slick({
//     infinite: true,
//     autoplay: false,
//     cssEase: 'ease-in',
//     speed: 400,
//     arrows: false,
//     variableWidth: true,
//     slidesToShow: 1,
//     nextArrow: dom(`${context} .slick-next`),
//     prevArrow: dom(`${context} .slick-prev`),
//     responsive: [
//       {
//         breakpoint: 800,
//         settings: {
//           centerMode: true,
//         },
//       },
//     ],
//   });

//   $(`${context} .slider-prev`).click(() =>
//     $(`${context} .slider`).slick('slickPrev')
//   );
//   $(`${context} .slider-next`).click(() =>
//     $(`${context} .slider`).slick('slickNext')
//   );
// }

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
    console.log(i, parseInt(index));
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
    console.log('initialized');
    updateWhenIndex(0, buttons);
  });

  // Update the nav items with active class on init
  $(`${context} .slider`).on('reInit', () => {
    console.log('reinitialized');
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

// export function initStepsSlider(context) {
//   $(`${context} .slider`).slick({
//     infinite: true,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     arrows: false,
//     autoplay: false,
//     autoplaySpeed: 10000,
//     adaptiveHeight: true,
//   });

//   fancyNav(context);
// }

// function unslickWhen(cond, slider, settings) {
//   if (cond()) {
//     if (slider.hasClass('slick-initialized')) {
//       slider.slick('unslick');
//     }
//   } else if (!slider.hasClass('slick-initialized')) {
//     slider.slick(settings);
//   }
// }

// export function initPortfolioSlider(context) {
//   const $slickSlider = $(`${context} .slider`);

//   const settings = {
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     autoplay: false,
//     arrows: false,
//     fade: true,
//     asNavFor: `${context} .slider-sub`,
//   };

//   unslickWhen(() => $(window).width() < 455, $slickSlider, settings);

//   // reslick only if it's not slick()
//   $(window).on('resize', () => {
//     unslickWhen(() => $(window).width() < 455, $slickSlider, settings);
//   });

//   $(`${context} .slider-sub`).slick({
//     infinite: true,
//     slidesToShow: 3,
//     variableWidth: true,
//     slidesToScroll: 1,
//     arrows: false,
//     autoplay: false,
//     autoplaySpeed: 5000,
//     asNavFor: `${context} .slider`,
//     focusOnSelect: true,
//   });

//   $(`${context} .slider-prev`).click(() =>
//     $(`${context} .slider-sub`).slick('slickPrev')
//   );
//   $(`${context} .slider-next`).click(() =>
//     $(`${context} .slider-sub`).slick('slickNext')
//   );
// }

export function destroySlider(context) {
  $(`${context} .slider`).slick('unslick');
  $(`${context} .slider-sub`).slick('unslick');
}
