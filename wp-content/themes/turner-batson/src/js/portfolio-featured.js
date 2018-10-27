import { initFeaturedSlider } from './modules/slider';
import { dom, domAll } from './modules/dom';

initFeaturedSlider('[data-slider="featured"]');

function adjustSlides() {
  if (window.innerWidth < 992) {
    const slider = dom('.featured-projects-slider');
    if (slider) {
      const newHeight = slider.clientHeight;
      const slides = domAll('.featured-projects-img', slider);
      slides.forEach(slide => {
        slide.style.height = `${newHeight}px`;
      });
    }
  }
}

let resizeTimer;

window.addEventListener('resize', () => {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(adjustSlides, 250);
});

adjustSlides();
