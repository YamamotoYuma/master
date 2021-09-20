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
		shortcode_atts(
			array(
				'file' => 'default',
			),
			$params
		);
	ob_start();
	/* include STYLESHEETPATH . "/$file.php";  元コード*/
	$name = $params['file'];
	include get_stylesheet_directory() . "/$name.php";
	return ob_get_clean();
}
add_shortcode( 'myphp', 'my_php_include' );
