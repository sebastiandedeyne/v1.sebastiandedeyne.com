const needsCodeHighlights = !!document.querySelector('.markup pre code');

if (needsCodeHighlights) {
  import('./modules/highlight' /* webpackChunkName: "/js/highlight" */).then(
    highlight => highlight.init()
  );
}
