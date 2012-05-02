// Filename: app.js
define([
    'order!jQuery',
    'order!modules/utils',
    'order!modules/widgets'
    ], function($, NUtils, NWidgets){
        var initialize = function(){
            NWidgets.slider();
        };

        return { 
            initialize: initialize
        };
    });
