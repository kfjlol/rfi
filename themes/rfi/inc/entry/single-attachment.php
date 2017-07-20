                                    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" >
                                        <?php $attach =  wp_get_attachment_image_src(get_the_ID(), "full"); ?>
                                        <section class="post_content clearfix" itemprop="articleBody">
                                            <a href="<?php echo $attach[0]; ?>">
                                            <?php echo wp_get_attachment_image(get_the_ID(), "full"); ?>
                                            </a>
                                        </section> <!-- end article section -->
                                    
                                    </article> <!-- end article -->
                                    <?php unset($attach); ?>