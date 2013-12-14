<?php 
define('WP_USE_THEMES', false);
define('WP_DEBUG', true);
//global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
require($_SERVER["DOCUMENT_ROOT"] . '/wp-load.php');

$view = $_REQUEST["view"];


 if ($view == '768') : 
   echo do_shortcode('[google-translate]');
 else :
   echo 'false';
 endif;

 ?>