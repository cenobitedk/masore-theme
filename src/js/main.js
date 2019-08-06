var Luminous = require('luminous-lightbox').Luminous;
var LuminousGallery = require('luminous-lightbox').LuminousGallery;

var images = document.querySelectorAll('.image-gallery');
var gallery = new LuminousGallery(images);
var fabric_images = document.querySelectorAll('.image-fabric');
var fabric_gallery = new LuminousGallery(fabric_images);

var $ = document.querySelector.bind(document);
if ($('.media-wrap')) {
    var v = $('#video');
    var m = $('.mute');
    var a = $('.audio');
    function toggleIcon() {
      m.style.visibility = v.muted ? 'visible' : 'hidden';
      a.style.visibility = v.muted ? 'hidden' : 'visible';
    }
    function toggleMute() {
        v.muted = !v.muted;
        toggleIcon();
    }
    v.addEventListener('play', toggleIcon);
    m.addEventListener('click', toggleMute);
    a.addEventListener('click', toggleMute);
}
