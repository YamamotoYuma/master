<?php
/**
 * 
 * スタイルシート、スクリプトのインクルード
 * 
 */

/*--------------------------------
 * UnderscoresデフォルトCSS・JS読み込み
 *--------------------------------*/
function underscores_scripts() {
	wp_enqueue_style( 'underscores-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'underscores-style', 'rtl', 'replace' );

	wp_enqueue_script( 'underscores-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'underscores_scripts' );

/*--------------------------------
 * CSS読み込み
 *--------------------------------*/
function my_styles() {
	//wp_enqueue_style('swiper-style','https://unpkg.com/swiper/swiper-bundle.min.css'); //CDN：swiper.css
	wp_enqueue_style('fontAwesome-style','https://use.fontawesome.com/releases/v5.6.1/css/all.css'); //CDN：fontAwesome
	wp_enqueue_style('validationEngine.jquery.css','https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css'); //CDN：validationEngine.jquery.css
	wp_enqueue_style('main-style', get_theme_file_uri('/css/main.css'),array(),date("YmdHi")); //SASSコンパイル後のCSSファイル
}
add_action( 'wp_enqueue_scripts', 'my_styles' );

/*--------------------------------
 * JavaScript読み込み
 *--------------------------------*/
function my_script() {
	//wp_enqueue_script('swiper.js','https://unpkg.com/swiper/swiper-bundle.min.js','','1.0.0',true); //CDN：swiper.js
	wp_enqueue_script('validationEngine-ja.js-js',get_theme_file_uri('/js/jquery.validationEngine-ja.js'),'','1.0.0',true); //CDN：validationEngine-ja.js
	wp_enqueue_script('validationEngine-js','https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js','','1.0.0',true); //CDN：validationEngine.js
	wp_enqueue_script('common-js', get_theme_file_uri('/js/common.js'),array(),date("YmdHi"),true);//common.js
}
add_action( 'wp_enqueue_scripts', 'my_script' );

/*--------------------------------
 * JQuery読み込み直し
 *--------------------------------*/
function load_js() {
	if ( !is_admin() ){
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' );
	}
}
add_action( 'wp_print_scripts', 'load_js' );

// --------------------------------
//  * 管理画面用CSS読み込み
//  *--------------------------------
function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/css/admin.css', false, '1.0.0' );//管理画面CSS
    wp_enqueue_style( 'custom_wp_admin_css' );
    }
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );