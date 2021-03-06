<?php
/**
 * ウィジェットエリア・ナビゲーションエリアを定義
 *
 * @package WordPress
 */

/**
 * ------ ウィジェットエリアを定義 -------
 */
function underscores_widgets_init() {
	register_sidebar( // サイドバー.
		array(
			'name'          => esc_html__( 'Sidebar', 'underscores' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'underscores' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="el_sideBarTtl">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( // 投稿コンテンツ下部.
		array(
			'name'          => '投稿下部',
			'id'            => 'sidebar-2',
			'before_widget' => '<section id="%1$s" class="widgetUC %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="el_underContTtl">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'underscores_widgets_init' );

/**
 * ------ ナビメニューエリアを定義 -------
 */
function register_my_menu() {
	register_nav_menu( 'main-menu', 'Main Menu' ); // デフォルト.
	register_nav_menu( 'footer-left', 'Footer Left' ); // フッター（左）.
	register_nav_menu( 'footer-right', 'Footer Right' ); // フッター（右）.
}
add_action( 'after_setup_theme', 'register_my_menu' );
