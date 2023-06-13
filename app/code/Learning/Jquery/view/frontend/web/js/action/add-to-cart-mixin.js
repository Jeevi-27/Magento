
define([
    'jquery'
], function ($) {
    'use strict';

    $.widget('mage.catalogAddToCart', {
       
        /**
         * Handler for the form 'submit' event
         *
         * @param {jQuery} form
         */
        submitForm: function (form) {
            console.log('Add to cart successfully');
            console.log(form);
        },

     
    });

    return $.mage.catalogAddToCart;
});