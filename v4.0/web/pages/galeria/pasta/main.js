// Fonte: https://codepen.io/vhanla/pen/PxjZvj

var gallery = document.querySelector('#gallery');
var deleteButton = document.querySelectorAll('.wrapper');

var getVal = function (elem, style) { 
    return parseInt(
        window.getComputedStyle(elem).getPropertyValue(style)
    ); 
};

var getHeight = function (item) { 
    return item.querySelector('.content').getBoundingClientRect().height; 
};

gallery.querySelectorAll('img').forEach(function (item) {

    if (!item.complete) {
        item.addEventListener('load', function () {
            var altura = getVal(gallery, 'grid-auto-rows');
            var gap = getVal(gallery, 'grid-row-gap');
            var gitem = item.parentElement.parentElement;

            gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
        });
    }
});

gallery.querySelectorAll('.gallery-item').forEach(function (item) {
    item.addEventListener('click', function () {        
        item.classList.toggle('full');    
        
        deleteButton.forEach(function (btn) {
            btn.classList.toggle('hidden');
        });
    });
});
