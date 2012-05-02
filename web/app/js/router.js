define([
    'jQuery',
    'Underscore',
    'Backbone',
    'views/page/view'
    ], function($, _, Backbone, pageView ){
        var AppRouter = Backbone.Router.extend({
            routes: {
                '*actions': 'defaultAction'
            },
           
            defaultAction: function(actions){
                new pageView(); 
            }
        });

        var initialize = function(){
            new AppRouter;
            Backbone.history.start();
        };
        
        return { 
            initialize: initialize
        };
    });