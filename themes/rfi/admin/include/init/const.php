<?php
/**
 * Defining Constants.
 *
 * @package    Axiom
 * @author     averta
 * @copyright  Copyright (c) averta co
 * @version    Release: 1.1
 * @link       http://www.averta.net
 */
 
/*-----------------------------------------------------------------------------------*/
/*  Define Global Vars
/*-----------------------------------------------------------------------------------*/

// core version
if(! defined('AXIOM_VERSION') ) define( 'AXIOM_VERSION', '1.23.0'             );

// domain name for tranlation file
if(! defined('THEME_DOMAIN')  ) define('THEME_DOMAIN'  , 'default'            );



// Server path for current theme directory
if(! defined('THEME_DIR')      ) define('THEME_DIR', get_template_directory().'/'     );

// Http url of current theme directory
if(! defined('THEME_URL')      ) define('THEME_URL', get_template_directory_uri().'/' );


// Server path for theme inc directory
if(! defined('THEME_INC_DIR')  ) define('THEME_INC_DIR', THEME_DIR. 'inc/'   );

// Http url of theme inc directory
if(! defined('THEME_INC_URL')  ) define('THEME_INC_URL', THEME_URL. 'inc/'  );



// this id is used as prefix in database field names - specific for each theme
if(! defined('THEME_ID')      ) define('THEME_ID'      ,  "lotus" );

// theme name
$theme_data = wp_get_theme();
if(! defined('THEME_NAME')    ) define('THEME_NAME'    ,  $theme_data->Name );



// Server path for admin folder
if(! defined('ADMIN_DIR')     ) define('ADMIN_DIR'    , THEME_DIR. 'admin/'    );

// Http url of admin folder
if(! defined('ADMIN_URL')     ) define('ADMIN_URL'    , THEME_URL. 'admin/'    );



// Server path for admin > include folder
if(! defined('ADMIN_INC')     ) define('ADMIN_INC'    , ADMIN_DIR. 'include/'  );

// Http url of admin > include folder
if(! defined('ADMIN_INC_URL') ) define('ADMIN_INC_URL', ADMIN_URL. 'include/'  );



// Server path for admin > css folder
if(! defined('ADMIN_CSS')     ) define('ADMIN_CSS'    , ADMIN_DIR. 'css/'      );

// Http url of admin > css folder
if(! defined('ADMIN_CSS_URL') ) define('ADMIN_CSS_URL', ADMIN_URL. 'css/'      );



// Server path for admin > js folder
if(! defined('ADMIN_JS')      ) define('ADMIN_JS'     , ADMIN_DIR. 'js/'       );

// Http url of admin > js folder
if(! defined('ADMIN_JS_URL')  ) define('ADMIN_JS_URL' , ADMIN_URL. 'js/'       );


// Disable Post Revisions
// define('WP_POST_REVISIONS', false );

// Change Delays between auto-saves
// define('AUTOSAVE_INTERVAL', 60 );

?>