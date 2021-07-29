<?php
/*--------------------------------
 *	変数定義
--------------------------------*/
$navSticky = array( //ヘッダー固定ナビ
    'container' => false,
    'menu_class' => 'bl_stickyNav', //「ul」要素にクラス指定
    'theme_location' => 'menu-1', //使用するメニューを指定
);

/*--------------------------------
*	DOM生成
--------------------------------*/
?>
<nav class="js_stickyNav bl_stickyNav_wrapper">
    <?php wp_nav_menu( $navSticky ); //ヘッダー固定ナビ ?>
</nav>