<?php
/* The template for displaying the footer.
 * Contains the closing of the body div and all content
 * after.  Calls sidebar-footer.php for bottom widgets. */ 
 
 global $axiom_options;
 ?>
		
    <footer id="sitefooter" class="wrapper" role="contentinfo" >
        <div class="container fold">
            
            <?php if( isset($axiom_options["show_socials_in_footer"]) ) echo axiom_the_socials(); ?>
            
            <div id="copyright">
                <?php if(!empty($axiom_options["copyright"])) { ?>
                <small><?php echo $axiom_options["copyright"]; ?></small>
                <?php } ?>
            </div>
            
            <?php wp_nav_menu( array( 
                
                'container'      => 'nav',
                'container_id'   => 'footer_nav',
                'menu_id'        => '',
                'menu_class'     => 'footer-menu',
                'theme_location' => 'footer' ,
                'fallback_cb'    =>  FALSE  // do not display default menu if nothing is set in menu location
                )); 
            ?>
            <!-- end navigation -->
            
            
        </div><!-- end of container -->
    </footer><!-- end sitefooter -->
    
    <div class="scroll2top"></div>

    <script>
        <?php if(isset($axiom_options["axiom_user_custom_js"])) echo stripslashes($axiom_options["axiom_user_custom_js"]); ?>
    </script><!-- user custom js -->
    
    <!--[if (lte IE 8)]>
    <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/libs/polyfills/selectivizr-min.js"></script>
    <![endif]-->
     
    <!-- outputs by wp_footer -->
    <?php wp_footer(); ?>
    <!-- end wp_footer -->
    
</div><!--! end of #inner-body -->
</body>
</html>