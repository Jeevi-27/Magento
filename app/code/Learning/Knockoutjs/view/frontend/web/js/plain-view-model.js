define(['ko'],function(ko){
    'use strict';

    return function(){
        const viewModel ={
            exchange_rates : ko.observableArray([
                {
                    currency: 'USD',
                    rate :'70'
                },
                {
                    currency: 'IN',
                    rate :'50'
                },

                {
                    currency: 'Japan',
                    rate :'60'
                }


            ])
        };
        return viewModel;
    }

});