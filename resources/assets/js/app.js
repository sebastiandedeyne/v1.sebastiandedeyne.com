import header from './components/header';

header();

const needsCodeHighlights = !!document.querySelector('.markup pre code');

if (needsCodeHighlights) {
  import('./components/highlight' /* webpackChunkName: "highlight" */).then(
    highlight => highlight.default()
  );
}
