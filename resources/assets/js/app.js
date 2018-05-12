// import sponsor from './components/sponsor';
import header from './components/header';

header();
// sponsor();

const needsCodeHighlights = !!document.querySelector('.markup pre code');

if (needsCodeHighlights) {
  import('./components/highlight' /* webpackChunkName: "highlight" */).then(
    highlight => highlight.default()
  );
}
