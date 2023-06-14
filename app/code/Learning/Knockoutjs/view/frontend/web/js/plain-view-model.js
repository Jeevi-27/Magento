define(['ko'],function(ko){
    'use strict';

    return function(){
        const title =ko.observable("This is title ssadf");
        title.subscribe(function(newValue)
        {
                console.log('New title:',newValue);
        });
        title.subscribe(function(oldValue)
        {
                console.log('Old value:',oldValue);
        }, this, 'beforeChange');
        return {
            title :title
        }
    }

});