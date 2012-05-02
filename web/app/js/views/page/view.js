define([
    'jQuery',
    'Underscore',
    'Backbone'
    ], function($, _, Backbone){
        var mainHomeView = Backbone.View.extend({
            el: $("#content"),
            initialize: function() {
                var self = this;
                $.get(this.getRoute(), function(data){
                    self.render(data);
                });
            },
            render: function(html){
                this.el.html(html);
                $(".rslides").responsiveSlides({
                    auto: true,             // Boolean: Animate automatically, true or false
                    speed: 750,            // Integer: Speed of the transition, in milliseconds
                    timeout: 5000,          // Integer: Time between slide transitions, in milliseconds
                    pager: false,           // Boolean: Show pager, true or false
                    nav: false,             // Boolean: Show navigation, true or false
                    random: false,          // Boolean: Randomize the order of the slides, true or false
                    pause: false,           // Boolean: Pause on hover, true or false
                    pauseControls: false,   // Boolean: Pause when hovering controls, true or false
                    prevText: "Previous",   // String: Text for the "previous" button
                    nextText: "Next",       // String: Text for the "next" button
                    maxwidth: "none",       // Integer: Max-width of the slideshow, in pixels
                    controls: "",           // Selector: Where controls should be appended to, default is after the 'ul'
                    namespace: "rslides"    // String: change the default namespace used
                });
            },
            getRoute: function(){ 
                var hash = window.location.hash;
                var route = hash.substring(1);
                return route;
            }
        });
        return mainHomeView;
    });
