                    <div class="wrapper">
                        
                        <div class="container">
                           <?php while ( have_posts() ) : the_post(); ?>

	                       <?php include 'entry/single-attachment.php'; ?>
                        
                           <?php endwhile; // end of the loop. ?>
                        </div><!-- container -->
                        
                    </div><!-- wrapper -->