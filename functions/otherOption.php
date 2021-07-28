<?php
/**
 * 
 * その他のオプション定義
 * 
 */

/*--------------------------------
    Underscoresデフォルト記述
--------------------------------*/
if ( ! defined( '_S_VERSION' ) ) {
	// 各リリースのテーマのバージョン番号を置き換えます。
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'underscores_setup' ) ) :
	/**
	 * テーマのデフォルトを設定し、さまざまな WordPress 機能のサポートを登録します。
	 * この関数は、init フックの前に実行される after_setup_theme フックにフックされていることに注意してください。投稿サムネイルのサポートを示すなど、一部の機能には init フックが遅すぎます。
	 */
	function underscores_setup() {
		/*
		 * テーマを翻訳できるようにします。
		 * 翻訳は /languages/ ディレクトリにファイルできます。
		 * If you're building a theme based on Underscores, use a find and replace
		 * アンダースコアに基づいてテーマを作成している場合は、検索と置換を使用して、すべてのテンプレート ファイルで「アンダースコア」をテーマの名前に変更します。
		 */
		load_theme_textdomain( 'underscores', get_template_directory() . '/languages' );

		// デフォルトの投稿とコメントの RSS フィード リンクを head に追加します。
		add_theme_support( 'automatic-feed-links' );

		/*
		 * WordPress にドキュメントのタイトルを管理させます。
		 * テーマのサポートを追加することで、このテーマはドキュメント ヘッドでハードコードされた <title> タグを使用しないことを宣言し、WordPress がそれを提供することを期待しています。
		 */
		add_theme_support( 'title-tag' );

		/*
		 * 投稿とページで投稿サムネイルのサポートを有効にします。
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// このテーマは、1 つの場所で wp_nav_menu() を使用します。
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'underscores' ),
			)
		);

		/*
		 * 検索フォーム、コメント フォーム、コメントのデフォルトのコア マークアップを有効な HTML5 を出力するように切り替えます。
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// WordPress のコア カスタム背景機能を設定します。
		add_theme_support(
			'custom-background',
			apply_filters(
				'underscores_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// ウィジェットの選択的リフレッシュのテーマ サポートを追加します。
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * コア カスタム ロゴのサポートを追加します。
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'underscores_setup' );

/**
 * テーマのデザインとスタイルシートに基づいて、コンテンツの幅をピクセル単位で設定します
 *
 * 優先度 0 は、優先度の低いコールバックで使用できるようにします。
 *
 * @global int $content_width
 */
// function underscores_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'underscores_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'underscores_content_width', 0 );

/*--------------------------------
    本文抜粋の文字数指定
--------------------------------*/
function custom_excerpt_length( $length ) {
return 50;	
}	
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*--------------------------------
    本文抜粋文字数超過の指定
--------------------------------*/
function new_excerpt_more($more) {
return '…続きを読む';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*--------------------------------
    投稿の「投稿日」と「更新日」の制御
--------------------------------*/
function get_mtime($format) {
$mtime = get_the_modified_time('Ymd');
$ptime = get_the_time('Ymd');
if ($ptime > $mtime) {
return get_the_time($format);
} elseif ($ptime === $mtime) {
return null;
} else {
return get_the_modified_time($format);
}}

/*--------------------------------
    カスタムロゴのDOM調整
--------------------------------*/
add_filter( 'get_custom_logo', 'add_custom_logo_url' );
function add_custom_logo_url() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link el_siteLogo" rel="home" itemprop="url">%2$s</a>',
            esc_url( home_url() ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
				'class'    => 'custom-logo',
            ) )
        );
    return $html;   
}

/*--------------------------------
    固定ページにデフォルトアーカイブ機能(投稿一覧)を持たせる（変更後にパーマリンク設定で「変更を保存」すること）
--------------------------------*/
function post_has_archive( $args, $post_type ) {
	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'post'; // 該当固定ページスラッグ
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

/*--------------------------------
    アーカイブタイトルをカスタム
--------------------------------*/
function change_archive_title( $title ) {
	if ( is_category() ) { /* カテゴリーアーカイブの場合 */
	  	$title = single_cat_title( '', false );
	} elseif ( is_tax( 'relation' ) ) { //カスタムタクソノミー[relation]
	  	$title = single_term_title( "", false );
	} elseif ( is_tax( 'newscat' ) ) { //カスタムタクソノミー[newscat]
	  	$title = single_term_title( "", false );
	} elseif ( is_post_type_archive( 'post' ) ) {
	  	$title = post_type_archive_title( "", false ); /* デフォルト投稿タイプのアーカイブの場合 */
	} elseif ( is_post_type_archive( 'news' ) ) {
	  	$title = post_type_archive_title( "", false ); /* カスタム投稿タイプ[news]のアーカイブの場合 */
	}
	return $title;
  };
  add_filter( 'get_the_archive_title', 'change_archive_title' );

/*--------------------------------
    ダッシュボード非表示
--------------------------------*/
function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // アクティビティ
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health']); // サイトヘルス
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
  }
  add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
  remove_action( 'welcome_panel', 'wp_welcome_panel' ); // ようこそ！
  add_action( 'welcome_panel', 'custom_welcome_panel' );
function custom_welcome_panel() {
//ウェルカムダッシュボードここから?>
<div class="welcome-panel-content">
    <div class="welcome-panel-content_inner">
        <div class="content_wrapper left">
            <div class="content_siteLogo">
                <?php the_custom_logo(); ?>
            </div>
            <!-- /.content_siteLogo -->
            <div class="content_siteTtl">
                <h1><?php bloginfo( 'name' ); ?></h1>
                <p><?php bloginfo( 'description' ); ?></p>
            </div>
            <!-- /.content_siteTtl -->
        </div>
        <div class="content_wrapper right">
            <h2>操作方法にこまったら…</h2>
            <a href="<?php the_field('dv_manual','option');?>" class="button button-primary button-hero load-customize hide-if-no-customize" target="_blank">操作マニュアルへ</a> <!-- /.el_btn top -->
            <h2>もっと集客成果を出したい！と思ったら…</h2>
            <a href="<?php the_field('dv_roadmap','option');?>" class="button button-primary button-hero load-customize hide-if-no-customize" target="_blank">ウェブ集客ロードマップへ</a> <!-- /.el_btn top -->
        </div>
        <!-- /.content_wrapper -->
    </div>
    <!-- /.welcome-panel-content_inner -->
</div>
<?php
}

/*--------------------------------
    ログイン画面にサイトロゴ表示
--------------------------------*/
//ロゴの画像を変更
function custom_login_logo() {
	echo '<style type="text/css">.login h1 a { width: 100% !important; height: 150px !important; background: url('.get_bloginfo('template_directory').'/img/login-logo.png) no-repeat center center !important; margin-bottom: 30px !important; background-size: contain !important;}</style>';
}
add_action( 'login_enqueue_scripts', 'custom_login_logo' );
 
//ロゴのリンク先を変更
function custom_login_logo_url() {
	//サイトURLを取得
	$logo_url = get_bloginfo( 'url' );
	return $logo_url;
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );
 
//a要素のtitle属性を変更
function custom_login_logo_url_title() {
	return '任意の名称';
}
add_filter( 'login_headertitle', 'custom_login_logo_url_title' );

/*--------------------------------
    ユーザー権限「編集者」に「外観」の編集権限を付与
--------------------------------*/
add_action('admin_init', function() {
  $role = get_role( 'editor' );
  $role->add_cap( 'edit_theme_options' ); 
});