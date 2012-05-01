//Use ECMA strict mode
"use strict"

//Require configuration
require.config({
    paths: {
        loader: 'libs/loader',
        jQuery: 'libs/jquery/jquery',
        bootstrap: 'libs/bootstrap.min',
        cssua: 'libs/cssua.min',
        html5: 'libs/html5',
        loadCss: 'libs/loadCss',
        templates: '../templates'
    }

});

require([
    'order!loader',
    'order!app'
    ], function(Loader, App){
        App.initialize(); 
    });