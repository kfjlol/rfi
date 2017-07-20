        <?php global $axi_img_size, $more; 
        
            $more        = 0; // to enable read more tag
        
            $post_format = get_post_format($post->ID); 
            $has_attach  = FALSE;
            $the_attach  = "";
            $show_title  = true;
            
            switch ($post_format) {
                case 'aside':
                    
                    break;
                case 'gallery':
                    $size  = ($axi_layout != "no-sidebar")?$axi_img_size["side"]:$axi_img_size["full"];
            
                    $slider  = '[flexslider slideshow="no" effect="slide" easing="easeInOutQuad" ]';
                    for ($i=1; $i <= 5; $i++) {
                        $has_attach = true; 
                        $img_url = get_post_meta($post->ID, "axi_gallery_image".$i, true);
                        if(!empty($img_url)){
                            $slider .= '[simple_slide src="'.axiom_get_the_resized_image_src($img_url, $size[0], $size[1], true ).'"  ]';
                        }
                    }
                    $slider .= '[/flexslider]';
                    
                    if(!$has_attach) break;
                    
                    $the_media = do_shortcode($slider).'<div class="sep hbar"> </div>';
                    
                    break;
                case 'image':
                    $has_attach = has_post_thumbnail();
                    if(!$has_attach) break;
                    $size  = ($axi_layout != "no-sidebar")?$axi_img_size["side"]:$axi_img_size["full"];
                    $the_attach = axiom_get_the_post_thumbnail($post->ID, $size[0], $size[1], true);
                    
                    $the_media = '<div class="imgHolder lightbox">'.
                                    '<a href="'.av3_get_the_attachment_url($post->ID, "full").'" data-rel="prettyPhoto">'.
                                        $the_attach.
                                        '<span></span>'.
                                    '</a>'.
                                    '<ul><li class="hover-plus"><a href="'.av3_get_the_attachment_url($post->ID, "full").'" data-rel="prettyPhoto" ></a></li></ul>'.
                                 '</div><div class="sep hbar"> </div>';
                    break;
                    
                case 'link':
                    $the_link = get_post_meta($post->ID, "the_link", true);
                    $show_title = TRUE;
                    $has_attach = false;
                    if(!$has_attach) break;
                    break;
                    
                case 'video':
                    $video_link = get_post_meta($post->ID, "youtube", true);
                    $mp4        = get_post_meta($post->ID, "mp4" , true);
                    $ogg        = get_post_meta($post->ID, "ogg" , true);
                    $webm       = get_post_meta($post->ID, "webm", true);
                    $flv        = get_post_meta($post->ID, "flv" , true);
                    $poster     = get_post_meta($post->ID, "poster", true);
                    $skin       = get_post_meta($post->ID, "skin"  , true);
                    $has_attach = (!empty($video_link) || !empty($mp4) || !empty($ogg) || !empty($webm) || !empty($flv));
                    if(!$has_attach) break;
                    $the_attach = do_shortcode('[video fit="yes" url="'.$video_link.'" mp4="'.$mp4.'" ogg="'.$ogg.'" webm="'.$webm.'" flv="'.$flv.'" poster="'.$poster.'" skin="'.$skin.'" uid="axi_vid'.$post->ID.'" size="0" ]');
                    $the_media = $the_attach;
                    unset($video_link, $mp4,$ogg,$webm,$flv,$poster);
                    break;
                    
                case 'audio':
                    $mp3        = get_post_meta($post->ID, "mp3" , true);
                    $oga        = get_post_meta($post->ID, "oga" , true);
                    $skin       = get_post_meta($post->ID, "audio_skin"  , true);
                    $soundcloud = get_post_meta($post->ID, "soundcloud"  , true);
                    $has_attach = (!empty($mp3) || !empty($oga) || !empty($soundcloud));
                    if(!$has_attach) break;
                    if(!empty($mp3) || !empty($oga))
                        $the_attach = do_shortcode('[audio mp3="'.$mp3.'" ogg="'.$oga.'" skin="'.$skin.'" uid="axi_au'.$post->ID.'" size="0" ]');
                    else
                        $the_attach = do_shortcode($soundcloud);
                    $the_media = $the_attach;
                    
                    unset($mp3,$oga,$skin, $soundcloud);
                    break;
                    
                case 'quote':
                    if(axiom_option("blog_content_on_listing") == "full") {
                        $quote  = get_the_content( __( 'Continue reading', 'default' ) );
                    }else {
                        $quote  = get_the_excerpt();
                    }
                    
                    $author = get_post_meta($post->ID, "the_author", true);
                    $show_title = false;
                    $has_attach = false;
                    if(!empty($author)) $quote .= "<br/>- <cite>".$author."</cite>";
                    $the_attach = do_shortcode('[column text_style="blockquote" size="0" ]'.$quote.'[/column]');
                    unset($quote);
                    break;
                    
                default:
                    $has_attach = has_post_thumbnail();
                    if(!$has_attach) {
                        $the_attach = axiom_get_first_image_from_content(get_the_content());
                        $has_attach = !empty($the_attach);
                    }else {
                        $size  = ($axi_layout != "no-sidebar")?$axi_img_size["side"]:$axi_img_size["full"];
                        $the_attach = axiom_get_the_post_thumbnail($post->ID, $size[0], $size[1], true);
                    }
                    
                    if(!$has_attach) break;
                    
                    $the_media = '<div class="imgHolder">'.
                                    '<a href="'.get_permalink().'">'.
                                        $the_attach.
                                    '</a>'.
                                 '</div><div class="sep hbar"> </div>';
                    unset($size);
                    break;
            }
        
        ?>
                                    <article <?php post_class("single-post list-post"); ?> >
                                            <?php if ( $has_attach ) : ?>
                                            <div class="entry-media">
                                                
                                                <?php echo $the_media; ?>
                                            
                                            </div>
                                            <?php endif; ?>
                                            
                                            <div class="entry-main">
                                                
                                                <div class="entry-header">
                                                    <?php if($show_title) { ?>
                                                    <h3 class="entry-title">
                                                        <a href="<?php if($post_format == "link"){ echo $the_link; }else{ the_permalink(); } ?>">
                                                            <?php the_title(); if($post_format == "link"){ echo '<br/><cite>- '.$the_link.'</cite>'; } ?>
                                                        </a>
                                                    </h3>
                                                    <?php } ?>
                                                    <div class="entry-format">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <div class="post-format format-<?php echo $post_format; ?>"> </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                                <div class="entry-content">
                                                    <?php if($post_format == "quote") {
                                                        echo $the_attach;
                                                    }else{
                                                        
                                                        if(axiom_option("blog_content_on_listing") == "full") {
                                                            the_content( __( 'Continue reading ..', 'default' ) );
                                                        }else {
                                                            the_excerpt();
                                                        }
                                                        // clear the floated elements at the end of content
                                                        echo '<div class="clear"></div>'; 
                                                        // create pagination for page content
                                                        wp_link_pages( array( 'before' => '<div class="page-links"><span>' . __( 'Pages:', 'default' ) .'</span>', 'after' => '</div>' ) );
                                                    } ?>
                                                </div>
                                                
                                                <footer class="entry-meta">
                                                    <?php if(comments_open()){ /* just display comments number if the comments is not closed. */?>
                                                    <a href="<?php the_permalink(); ?>#comments" class="cell-comment" title="<?php comments_number('No Comment', '1 Comment', '% Comments'); ?>" ><?php comments_number('0', '1', '%'); ?></a>
                                                    <?php } ?>
                                                        
                                                    <div class="cell-date weight1 left">
                                                        <em> </em><em> </em>
                                                        <time datetime="<?php the_time('Y-m-d')?>" title="<?php the_time('Y-m-d')?>" >
                                                            <strong><?php the_time('d')?></strong>
                                                            <span><?php the_time('M')?></span>
                                                        </time>
                                                    </div>
                                                    
                                                    <div class="entry-tax" role="category tag">
                                                        <?php $tax_name = 'category';
                                                              $tax_num_limit = 6; // add limit for number of categories displaying on blog listing page
                                                              $cat_terms = wp_get_post_terms($post->ID, $tax_name); 
                                                              if($cat_terms){
                                                                  foreach($cat_terms as $term){
                                                                      if($tax_num_limit > 0) {
                                                                        $tax_num_limit--;
                                                                        echo '<a href="'. get_term_link($term->slug, $tax_name) .'" title="'.__("View all posts in ","default").$term->name.'" rel="category" >'.$term->name.'</a>';
                                                                      }
                                                                  }
                                                              }
                                                        ?>
                                                    </div>
                                                    
                                                    <div class="readmore right">
                                                        <a href="<?php the_permalink(); ?>" class="linkbutton"><?php _e("Read More", "default"); ?></a>
                                                        <a href="<?php the_permalink(); ?>" class="linkblock">&#8226;&#8226;&#8226;</a>
                                                    </div>
                                                </footer>
                                                
                                            </div>

                                       </article>