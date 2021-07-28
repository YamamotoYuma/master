<?php

/*--------------------------------
    incフォルダ インクルード
--------------------------------*/
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

/*--------------------------------
    functionsフォルダ インクルード
--------------------------------*/
/*------ ウィジェット、ナビゲーション関連 -------*/
include( get_stylesheet_directory().'/functions/widgetAndNavi.php' );

/*------ Advanced Custom Field オプションページ関連 -------*/
include( get_stylesheet_directory().'/functions/acfOptionPage.php' );

/*------ カスタム投稿タイプ、カスタムタクソノミー -------*/
include( get_stylesheet_directory().'/functions/costomPostType.php' );

/*------ スタイルシート、スクリプトインクルード -------*/
include( get_stylesheet_directory().'/functions/include_styleAndScript.php' );

/*------ ショートコード作成 -------*/
include( get_stylesheet_directory().'/functions/shortCode.php' );

/*------ ユーザー定義関数 -------*/
include( get_stylesheet_directory().'/functions/userDefined.php' );

/*------ その他のオプション定義 -------*/
include( get_stylesheet_directory().'/functions/otherOption.php' );