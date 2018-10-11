import withDefault from './withDefault';

export default function replaceUrl(el) {
  const url = withDefault(false, 'theUrl', el.dataset);
  if (url) {
    el.setAttribute('data-the-url', url);
  }
}
