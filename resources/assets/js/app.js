const Turbolinks = require('turbolinks');
const WebfontLoader = require('webfontloader');
const { highlight } = require('./modules/hljs');

Turbolinks.start();

document.addEventListener('turbolinks:load', function() {
    highlight();
});

WebfontLoader.load({
    google: { families: ['Source Code Pro:400,700'] }
});