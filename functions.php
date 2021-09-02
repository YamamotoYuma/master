<?php
/**
 *  FileName: インクルード用ファイル
 *
 * @package WordPress
 */

/*
--------------------------------
	incフォルダ インクルード
--------------------------------
*/
/*------ カスタムヘッダー -------*/
require get_template_directory() . '/inc/custom-header.php';

/*------ Underscoresオリジナルテンプレートタグ -------*/
require get_template_directory() . '/inc/template-tags.php';

/*------ WordPressと連携してテーマを充実させる -------*/
require get_template_directory() . '/inc/template-functions.php';

/*------ カスタマイザー機能開放 -------*/
require get_template_directory() . '/inc/customizer.php';

/*------ Jetpack 互換ファイル -------*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
--------------------------------
	functionsフォルダ インクルード

--------------------------------
*/
/*------ ウィジェット、ナビゲーション関連 -------*/
require get_stylesheet_directory() . '/functions/widget-and-navi.php';
require get_stylesheet_directory() . '/functions/class-relatedpost.php';

/*------ Advanced Custom Field オプションページ関連 -------*/
require get_stylesheet_directory() . '/functions/acf-option-page.php';

/*------ カスタム投稿タイプ、カスタムタクソノミー -------*/
require get_stylesheet_directory() . '/functions/costom-post-type.php';

/*------ スタイルシート、スクリプトインクルード -------*/
require get_stylesheet_directory() . '/functions/include-style-and-script.php';

/*------ ショートコード作成 -------*/
require get_stylesheet_directory() . '/functions/short-code.php';

/*------ ユーザー定義関数 -------*/
require get_stylesheet_directory() . '/functions/user-defined.php';

/*------ その他のオプション定義 -------*/
require get_stylesheet_directory() . '/functions/other-option.php';
