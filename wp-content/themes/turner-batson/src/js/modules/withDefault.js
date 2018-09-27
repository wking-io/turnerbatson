const withDefault = (prop, fallback, obj) =>
  obj.hasOwnProperty(prop) ? obj[prop] : fallback;

export default withDefault;
