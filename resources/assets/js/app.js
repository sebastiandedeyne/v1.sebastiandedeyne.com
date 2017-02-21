var Turbolinks = require('turbolinks');
var highlight = require('./modules/hljs').highlight;

Turbolinks.start();

document.addEventListener('turbolinks:load', function () {
    highlight();
});
