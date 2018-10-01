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
