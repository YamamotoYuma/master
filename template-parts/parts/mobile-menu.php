<?php
/**
 * モバイルメニュー
 *
 * @package WordPress
 */

/*
--------------------------------
*	変数定義
--------------------------------
*/
$nav = array(
	'container'      => false,
	'menu_id'        => 'mobile-menu',
	'menu_class'     => 'bl_mobileMenu_nav',
	'theme_location' => 'sub-menu',
);
?>

<!--------------------------------
	トリガーボタン生成
--------------------------------->
<div class="el_menuTrigger_wrapper">
	<div class="el_menuTrigger js_menuTrigger" href="">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<!-- ./el_menuTrigger -->
</div>
<!-- ./el_menuTrigger_wrapper -->

<!--------------------------------
	ドロワーエリア生成
--------------------------------->
<div class="bl_mobileMenu js_mobileMenu">
	<div class="bl_mobileMenu_header">

	</div>
	<!-- /.bl_mobileMenu_header -->
	<div class="bl_mobileMenu_body">
		<nav><?php wp_nav_menu( $nav ); // ナビゲーション. ?></nav>
	</div>
	<!-- /.bl_mobileMenu_body -->
	<div class="bl_mobileMenu_footer">
		
	</div>
	<!-- /.bl_mobileMenu_footer -->
</div>
<!-- ./bl_mobileMenu -->
