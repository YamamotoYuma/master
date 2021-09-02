<?php
/**
 * ショートコード
 *
 * @package WordPress
 */

/**
 * --------------------------------
 * PHPファイル読み込み
 * --------------------------------
 *
 * @param 型 $params comment.
 */
function my_php_include( $params = array() ) {
	extract( shortcode_atts( array( 'file' => 'default' ), $params ) );
	ob_start();
	/* include STYLESHEETPATH . "/$file.php";  元コード*/
	include get_stylesheet_directory() . "/$file.php";
	return ob_get_clean();
}
add_shortcode( 'myphp', 'my_php_include' );
