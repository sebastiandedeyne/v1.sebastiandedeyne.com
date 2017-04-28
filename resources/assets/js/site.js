import Highlight from './modules/highlight';
import ServiceWorker from './modules/service-worker';
import Turbolinks from 'turbolinks';

Turbolinks.start();

document.addEventListener('turbolinks:load', () => {
    Highlight.start();
    ServiceWorker.start();
});
