var Luminous = require('luminous-lightbox').Luminous;
var LuminousGallery = require('luminous-lightbox').LuminousGallery;

var images = document.querySelectorAll('.image-gallery');
var gallery = new LuminousGallery(images, {
  injectBaseStyles: true
});
