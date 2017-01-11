var Turbolinks = require('turbolinks')
var WebfontLoader = require('webfontloader')
var highlight = require('./modules/hljs').highlight

Turbolinks.start()

document.addEventListener('turbolinks:load', function() {
    highlight()
})

WebfontLoader.load({
    google: { families: ['Source Code Pro:400,700'] }
})

require('./shadows')
