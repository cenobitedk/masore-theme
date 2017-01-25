var Luminous = require('luminous-lightbox').Luminous;
var LuminousGallery = require('luminous-lightbox').LuminousGallery;

var images = document.querySelectorAll('.image-gallery');
var gallery = new LuminousGallery(images);
var fabric_images = document.querySelectorAll('.image-fabric');
var fabric_gallery = new LuminousGallery(fabric_images, {
  sourceAttribute: 'data-href'
});
