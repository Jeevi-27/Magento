define(['uiComponent','jquery'],function(Component,$){
    'use strict';
    return Component.extend({
        getTitle: function(){
            return $.mage.__('test1');
            }
    });

});