var Turbolinks = require('turbolinks');
var WebfontLoader = require('webfontloader');
var highlight = require('./modules/hljs').highlight;
var Lightbulb = require('lightbulb');

Turbolinks.start();

document.addEventListener('turbolinks:load', function () {
    highlight();
    
    // Lightbulb.illuminate({
    //     container: '.js-shadows-container', 
    //     item: '.js-shadows-item', 
    //     spread: 20,
    //     color: 'rgba(0, 0, 0, .1)',
    //     inset: false,
    //     lightbulb: {
    //         x: 0, 
    //         y: 0,
    //         distance: 15,
    //     },
    // });
});

WebfontLoader.load({
    google: { families: ['Source Code Pro:400,700'] },
});