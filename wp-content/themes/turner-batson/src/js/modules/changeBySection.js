import compose from './compose';
import withDefault from './withDefault';
import fromTop from './fromTop';

const buildSections = elems => () =>
  elems.map(el => ({
    menuStyle: withDefault('', 'makeMenu', el.dataset),
    fromTop: fromTop(el),
  }));

const getSectionWithin = buffer => data =>
  data.reduce(
    (acc, { menuStyle, fromTop }) => (fromTop < buffer ? menuStyle : acc),
    'light'
  );

const updateNav = nav => menuStyle =>
  nav.setAttribute('data-menu-style', menuStyle);

export default function(nav, sections) {
  return compose(
    updateNav(nav),
    getSectionWithin(nav.offsetHeight),
    buildSections(sections)
  );
}
