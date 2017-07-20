;(function($){
    
    $('.nav-toggle').unbind('click')
                    .bind('click', function(event){
                        event.preventDefault();
                        $this = $(this);
                        $icon = $this.find("> a");
                        if($this.hasClass('active'))
                            $icon.attr("class", "icon-reorder"); 
                        else
                            $icon.attr("class", "icon-remove"); 
                        
                        $this.toggleClass('active');
                        $('nav#access .sf-menu').animate({ height:'toggle' });
    });
    
})(jQuery);