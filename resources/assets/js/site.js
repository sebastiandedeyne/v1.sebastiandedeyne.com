import Highlight from './modules/highlight';
import ServiceWorker from './modules/service-worker';
import Turbolinks from 'turbolinks';

ServiceWorker.install();

Turbolinks.start();

document.addEventListener('turbolinks:load', () => {
    Highlight.start();
});
