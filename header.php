<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Underscores
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site ly_siteBody js_siteBody">
	<div class="ly_siteBody_inner js_siteBody_inner">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'underscores' ); ?></a>

		<header id="masthead" class="site-header ly_header">
			<div class="ly_header_inner">
				<div class="bl_headerUtils">

					<?php if( is_front_page() or is_home() ): //サイトロゴ：トップページならh1タグに内包 ?>
						<h1 class="bl_headerUtils_logo_wrapper"><?php the_custom_logo(); ?></h1>
					<?php else ://サイトロゴ：トップページ以外ならdivタグに内包 ?>
						<div class="bl_headerUtils_logo_wrapper"><?php the_custom_logo(); ?></div>
					<?php endif; //END：サイトロゴ条件分岐 ?>
					
					<a class="el_btn" href="<?php the_field( 'ad_inquiryLink', 'option' ); ?>">お問い合わせ</a>

				</div>
				<!--/.bl_headerUtils-->	

				<nav>
					<?php
					$nav = array(
						'container' => false,
						'menu_id' => 'primary-menu', //「ul」要素にID指定
						'menu_class' => 'bl_headerNav', //「ul」要素にクラス指定
						'theme_location' => 'menu-1', //変更しない
					);
					wp_nav_menu( $nav );
					?>
				</nav>

				<nav class="js_stickyNav"><?php wp_nav_menu( $nav ); //上部固定ナビゲーション?></nav>

			</div>
			<!--/.ly_header_inner-->
		</header>
		<!--/.ly_header-->
		<?php get_template_part( 'template-parts/breadCrumb' ); //パンくずリスト読み込み ?>
