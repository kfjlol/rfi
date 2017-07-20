<?php
/**
 * $_GLOBAL configurations here.
 *
 * @package    Axiom
 * @author     averta
 * @copyright  Copyright (c) averta co
 * @version    Release: 1.0
 * @link       http://www.averta.net
 */
 
/*-----------------------------------------------------------------------------------*/
/*  Image Sizes
/*-----------------------------------------------------------------------------------*/

global $axi_img_size;

// "side" is the image contents in sidebar layouts (blog, news)
$side_size = axiom_option("is_hd_layout_enabled")? array( 798, null, null): array(675, null, null);
$full_size = axiom_option("is_hd_layout_enabled")? array(1140, null, null): array(960, null, null);

$axi_img_size = array(
                    
                    "i6"    => array(150, null, null),
                    "i6_1"  => array(150,   80, true),
                    "i6_2"  => array(150,  282, true),
                    
                    "i5"    => array(190, null, null),
                    "i5_1"  => array(190,  115, true),
                    "i5_2"  => array(190,  232, true),
                    
                    "i4"    => array(238, null, null),
                    "i4_1"  => array(238,  144, true),
                    "i4_2"  => array(238,  290, true),
                    
                    "i3"    => array(318, null, null),
                    "i3_1"  => array(318,  192, true),
                    "i3_2"  => array(318,  386, true),
                    
                    "i2"    => array(479, null, null),
                    "i2_1"  => array(479,  290, true),
                    "i2_2"  => array(479,  582, true),
                    
                    "i1"    => array(960, null, null),
                    "i1_1"  => array(960,  550, null),
                    
                    "full"  => $full_size,
                    "side"  => $side_size,
                    
                    "635"   => array(635, null, null),
                    "635_1" => array(635,  635, true)
                );
                
unset($side_size, $full_size);

?>