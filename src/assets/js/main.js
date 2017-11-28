// *********************************************************************
// *********************************************************************
// *********************************************************************

import grid from './components/Grid.vue';
import column from './components/Column.vue';
import box from './components/Box.vue';
import mediaobject from './components/MediaObject.vue';
import card from './components/Card.vue';
import flash from './components/Alert.vue';
import navbar from './components/Navbar.vue';
import btn from './components/Button.vue';
import modal from './components/Modal.vue';
import modaltrigger from './components/ModalTrigger.vue';
import field from './components/Field.vue';
import textfield from './components/Textfield.vue';

new Vue({
    el: '#app',
    delimiters: ['@{', '}'],
    components: {
        grid,
        column,
        box,
        mediaobject,
        card,
        flash,
        navbar,
        btn,
        modal,
        modaltrigger,
        field,
        textfield,
    }
});

import slick from 'slick-carousel';

// *********************************************************************
// *********************************************************************
// *********************************************************************

var form = $('.form');

form.on('submit', function(e) {
    e.preventDefault();

    var formData = new FormData($(this)[0]);

    $.ajax({
        url: $(form).attr('action'),
        type: 'POST',
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (returndata) {
            alert('success');
        },
        error: function () {
            alert('error');
        }
    });
});

/*
|--------------------------------------------------------------------------
| #TABS
|--------------------------------------------------------------------------
*/


// var tab = $('.js-tab'),
//     tabNav = $('.js-tab__nav'),
//     tabTrigger = $('.js-tab__trigger');
//
// tab.addClass('u-is__hidden');
// tab.first().removeClass('u-is__hidden');
//
// tabTrigger.click(function() {
//     var thisTab = $(this).attr('rel'),
//         thisTab = '#' + thisTab;
//
//     tab.addClass('u-is__hidden');
//
//     $('.js-tab' + thisTab).removeClass('u-is__hidden');
// });

/*
|--------------------------------------------------------------------------
| #SLIDER
|--------------------------------------------------------------------------
*/

var slider = $('.js-slider');

slider.slick({
    arrows: false,
    dots: true,
    autoplay: true
});

$('.slick-dots button').empty();

/*
|--------------------------------------------------------------------------
| #MENU
|--------------------------------------------------------------------------
*/

$('.menu__trigger').click(function() {
    $(this).toggleClass('is--open');
    $('.menu').toggleClass('is--open');
});

/*
|--------------------------------------------------------------------------
| #FADE POSTER
|--------------------------------------------------------------------------
*/

var vid = $('video');

vid.oncanplaythrough = function() {
    var $this = $(this);
    $this.attr('poster' , '').fadeOut('fast');
    $this.fadeIn('fast');
  vid.oncanplay = vid.play();
}
