<?php get_header(); //ヘッダー読み込み ?>
<div class="ly_cont<?php if ( get_field('dv_single','option') ) { echo ' ly_cont__col'; } ?> ly_cont__archive">
    <main id="primary" class="site-main ly_cont_main">

        <?php while ( have_posts() ) : the_post(); //START：メインループ ?>

        <?php get_template_part( 'template-parts/content/content', get_post_type() ); //コンテンツエリア読み込み ?>

        <?php $area = 'sidebar-2';
            if ( is_active_sidebar( $area ) ): ?>

        <section class="ly_sect__single ly_sect__widget">
                    <?php dynamic_sidebar( $area ); //ウィジェットエリア[投稿コンテンツ下] ?>
                </section>
        <!-- /.ly_sect ly_sect__widget -->
        <?php endif ;?>

        <?php get_template_part( 'template-parts/parts/pager', get_post_type() ); //ページャー読み込み ?>

        <?php endwhile; //END：メインループ ?>

    </main>

    <?php if ( get_field('dv_single','option') ) { get_sidebar(); } //サイドバー読み込み?>
</div>
<!--/.ly_cont-->
<?php get_footer();//フッター読み込み