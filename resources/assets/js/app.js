var Turbolinks = require('turbolinks');
var WebfontLoader = require('webfontloader');
var highlight = require('./modules/hljs').highlight;
var Lightbulb = require('lightbulb');

Turbolinks.start();

document.addEventListener('turbolinks:load', function () {
    highlight();
    
    const lightbulb = position => {
        console.log(position);
        Lightbulb.illuminate({
            container: '.js-shadows-container', 
            item: '.js-shadows-item', 
            spread: 20,
            color: 'rgba(0, 0, 0, .1)',
            inset: false,
            lightbulb: {
                x: position.x, 
                y: position.y,
                distance: 15,
            },
        });
    }

    Array.from(document.querySelectorAll('.js-shadows-item')).forEach((el) => {
        el.addEventListener('mouseover', (e) => {
            lightbulb(
                Lightbulb.positionInContainer(document.querySelector('.js-shadows-container'), e.target)
            );
        });
    });

    lightbulb({ x: 0, y: 0 });
});

WebfontLoader.load({
    google: { families: ['Source Code Pro:400,700'] },
});