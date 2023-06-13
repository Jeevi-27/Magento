define([],function(){
    'use strict';
    return function(checkoutData)
    {
        const org = checkoutData.getSelectedShippingAddress;
        checkoutData.getSelectedShippingAddress = function()
        {
            const address = org.bind(checkoutData)();
            console.log("Selected shipping address ",address);
            return address;
        }
        return checkoutData;
    }

});