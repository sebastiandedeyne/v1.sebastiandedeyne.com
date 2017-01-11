var Turbolinks = require('turbolinks')
var WebfontLoader = require('webfontloader')
var highlight = require('./modules/hljs').highlight
var { shadows } = require('./modules/shadows')

Turbolinks.start()

document.addEventListener('turbolinks:load', () => {
    highlight()
    
    shadows({
        container: '.js-shadows-container', 
        subjects: '.js-shadows-item', 
        strength: 8, 
        spread: 20
    })
})

WebfontLoader.load({
    google: { families: ['Source Code Pro:400,700'] }
})