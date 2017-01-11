var Turbolinks = require('turbolinks')
var WebfontLoader = require('webfontloader')
var highlight = require('./modules/hljs').highlight
var { shadows } = require('./modules/shadows')

Turbolinks.start()

document.addEventListener('turbolinks:load', () => {
    highlight()
    shadows('.js-shadows-container', '.js-shadows-item')
})

WebfontLoader.load({
    google: { families: ['Source Code Pro:400,700'] }
})