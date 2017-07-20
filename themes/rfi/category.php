<?php

get_header(); 

$cat_layout  = axiom_option('blog_category_page_layout') == 'medium'?'land':'';
$cat_sidebar = axiom_option('blog_category_sidebar_position') == ''?'right-sidebar':axiom_option('blog_category_sidebar_position');
?>
    <div id="main" class="list-post <?php echo $cat_layout.' '. $cat_sidebar; ?> ">
        <div class="wrapper fold clearfix">
            
            <section id="primary" >
                <div class="content" role="main"  >
                    
                            
                    <?php get_template_part('inc/loop', "post" ); ?>
                            
                    
                </div><!-- end content -->
            </section><!-- end primary -->
            
            
            <?php get_sidebar(); ?>
            
        </div>
    </div><!-- end main -->

<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>
