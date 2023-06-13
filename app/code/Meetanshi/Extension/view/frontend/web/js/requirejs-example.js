define(['jquery'],function($)
{
  'use strict';

  return function(config,element)
  {
    $.getJSON(config.base_url+'rest/V1/directory/currency',function(result) 
    {
      element.innerHTML=JSON.stringify(result,null,2);
    });
  }

})