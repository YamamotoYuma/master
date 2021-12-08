<?php
/**
 *  FileName: ヘッダーテンプレート
 *
 * @package WordPress
 */

/*
--------------------------------
 *	変数定義
--------------------------------
*/
$nav = array( // グローバルナビゲーション.
	'container'      => false,
	'menu_class'     => 'bl_headerNav',
	'theme_location' => 'main-menu',
);

/*
--------------------------------
 *	DOM生成
--------------------------------
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site ly_siteBody js_siteBody">

	<div class="ly_siteBody_inner js_siteBody_inner">

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'underscores' ); ?></a>

		<header id="masthead" class="site-header ly_header_wrapper">

			<div class="ly_header">
				<!-- /.ly_header -->
					<div class="ly_header_inner left">
						<?php if ( is_front_page() || is_home() ) : // A サイトロゴ：トップページならh1タグに内包. ?>
							<h1 class="bl_headerUtils_logo_wrapper"><?php the_custom_logo(); ?></h1>
						<?php else : // A サイトロゴ：トップページ以外ならdivタグに内包. ?>
							<div class="bl_headerUtils_logo_wrapper"><?php the_custom_logo(); ?></div>
						<?php endif; // A サイトロゴ条件分岐. ?>
					</div>
					<!--/.ly_header_inner-->

					<div class="ly_header_inner right mdlg">
						<nav class="bl_headerNav_wrapper"><?php wp_nav_menu( $nav ); // グローバルナビゲーション. ?></nav>
					</div>
					<!-- /.ly_header_inner right -->
			</div>

		</header>
		<!--/.ly_header-->

		<?php get_template_part( 'template-parts/parts/sticky-nav' ); // ヘッダー固定ナビ. ?>

		<?php get_template_part( 'template-parts/parts/bread-crumb' ); // パンくずリスト. ?>
