<?php get_header(); //ヘッダー読み込み ?>

<?php $page = get_post( get_the_ID() ); $slug = $page->post_name; //ページスラッグを取得?>
<div class="ly_cont ly_cont__<?php echo $slug; //ページスラッグをクラスに適用?> ly_cont__single">
    <main id="primary" class="site-main ly_cont_main">

        <?php while ( have_posts() ) : the_post(); //START：メインループ ?>

        <header class="page-header ly_sect_pageHeader">
            <h1 class="el_lv1Heading"><span><?php the_title(); //ページタイトル ?></span></h1>
        </header>

        <?php get_template_part( 'template-parts/content/content' ); //コンテンツエリア読み込み ?>

        <?php endwhile; //END：メインループ ?>

    </main>

</div>
<!--/.ly_cont-->

<?php get_footer();//フッター読み込み