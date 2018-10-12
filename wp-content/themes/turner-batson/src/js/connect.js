import { dom, domAll } from './modules/dom';
import { spamCheck, toggleActive } from './modules/form';

const inputs = domAll('.connect-form__input');
inputs.forEach(toggleActive('connect-form__input--active'));

const btn = dom('.gform_button');
btn.disabled = true;
inputs.forEach(input => {
  if (input.classList.contains('spam-check')) {
    spamCheck(btn, input);
  }
});
