<?php
/**
 * ナビゲーション関連
 *
 * @package WordPress
 */

/**
 * --------------------------------
 * ナビメニューの追加
 * --------------------------------
 */
function register_my_menu() {
	register_nav_menu( 'main-menu', 'Main Menu' );
	register_nav_menu( 'sub-menu', 'Sub Menu' );
}
add_action( 'after_setup_theme', 'register_my_menu' );
