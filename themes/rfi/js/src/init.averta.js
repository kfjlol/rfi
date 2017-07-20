;(function($){

/*--------------------------------------------
 *  Averta plugins
 *--------------------------------------------*/
    
    // on document ready 
    $(function(){
    
        $('.widget-tabs .widget-inner').avertaLiveTabs({
            tabs:            'ul.tabs > li',            // Tabs selector
            tabsActiveClass: 'active',                  // A Class that indicates active tab
            contents:        'ul.tabs-content > li',    // Tabs content selector    
            contentsActiveClass: 'active',              // A Class that indicates active tab-content    
            transition:      'fade',                    // Animation type white swiching tabs
            duration :       '500'                      // Animation duration in mili seconds
       });
   
   });
   
   
   $(".scroll2top").avertaScroll2top({ ease:'easeInOutQuint', speed:800 });
   
})(jQuery);