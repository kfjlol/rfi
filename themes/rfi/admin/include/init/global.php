<?php
/**
 * Essential core functions here
 *
 * @package    Axiom
 * @author     averta
 * @copyright  Copyright (c) averta co
 * @version    Release: 1.1
 * @link       http://www.averta.net
 */

global $axiom_options;
$axiom_options = get_option( THEME_ID.'_formatted_options');


//// get custom css version ///////////////////////////////////////////////////////////////////////
//// this option will be used to clear browser cache when new options are saved in custom css /////

$GLOBALS[THEME_ID."_custom_css_ver"] = get_option(THEME_ID."_custom_css_ver");
if(empty($GLOBALS[THEME_ID."_custom_css_ver"])) {
    $GLOBALS[THEME_ID."_custom_css_ver"]    = 1.0;
    update_option(THEME_ID."_custom_css_ver", 1.0);
}

//// Remove generatore meta tag - refuse to show wordpress version installed //////////////////////

remove_action('wp_head', 'wp_generator'); 

//// get all options and convert to usable format /////////////////////////////////////////////////


function get_axiom_options( $option_id ){
    $raw_options = get_option( $option_id);
    
    return format_axiom_options($raw_options);
}

function format_axiom_options($raw_options){
    $output_options = array();
    
    if( is_array($raw_options) && (count($raw_options) > 0)){
        foreach ($raw_options as $key => $value) 
            $output_options[$value["name"]] = $value["value"];
    }
    
    return $output_options;
}

/// quick access /////////////////////////////////////////////////////////////////////////////////

// quick access to theme option
function axiom_option($key){
    global $axiom_options;
    return is_array($axiom_options) && array_key_exists($key, $axiom_options) ? $axiom_options[$key]: '';
}


// quick access to image sizes
function axiom_img_size($key){
    global $axi_img_size;
    return is_array($axi_img_size) && array_key_exists($key, $axi_img_size) ? $axi_img_size[$key]: '';
}

?>