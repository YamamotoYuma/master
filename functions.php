<?php
/**
 *  FileName: 機能に関する記述のルートファイル
 *
 * @package WordPress
 */

/*
--------------------------------
*  スターターテーマ「Underscores」の標準機能関連ファイル
--------------------------------
*/
/*------ Underscoresオリジナルテンプレートタグ -------*/
require get_template_directory() . '/inc/template-tags.php';

/*------ WordPressと連携してテーマを充実させる -------*/
require get_template_directory() . '/inc/template-functions.php';

/*------ カスタマイザー機能開放 -------*/
require get_template_directory() . '/inc/customizer.php';

/*
--------------------------------
*  機能関連のファイル
--------------------------------
*/
/*------ ウィジェット、ナビゲーション関連 -------*/
require get_stylesheet_directory() . '/functions/widget-nav.php';

/*------ Advanced Custom Field オプションページ関連 -------*/
require get_stylesheet_directory() . '/functions/acf.php';

/*------ カスタム投稿タイプ、カスタムタクソノミー -------*/
require get_stylesheet_directory() . '/functions/post-type.php';

/*------ スタイルシート、スクリプトインクルード -------*/
require get_stylesheet_directory() . '/functions/enqueue.php';

/*------ ショートコード作成 -------*/
require get_stylesheet_directory() . '/functions/short-code.php';

/*------ ユーザー定義関数 -------*/
require get_stylesheet_directory() . '/functions/original.php';

/*------ その他のオプション定義 -------*/
require get_stylesheet_directory() . '/functions/option.php';

/*
--------------------------------
*  widgetの追加
--------------------------------
*/
require get_stylesheet_directory() . '/widget/class-relatedpost.php';
