<!--モバイルメニュー：トリガー-->
<div class="el_menuTrigger_wrapper">
    <div class="el_menuTrigger js_menuTrigger" href="">
        <span></span>
        <span></span>
        <span></span>
    </div>
<!-- ./el_menuTrigger -->
</div>
<!-- ./el_menuTrigger_wrapper -->

<!--モバイルメニュー：ドロワー-->
<div class="bl_mobileMenu js_mobileMenu">
    <nav>
    <?php
        wp_nav_menu( //ナビゲーションメニュー
            array(
                'container' => false,
                'menu_id' => 'mobile-menu',
                'menu_class' => 'bl_mobileMenu_nav',
                'theme_location' => 'menu-1',
            ));
        ?>
    </nav>
</div>
<!-- ./bl_mobileMenu -->