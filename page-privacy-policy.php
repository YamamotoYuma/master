<?php get_header(); //ヘッダー読み込み ?>

<?php $page = get_post( get_the_ID() ); $slug = $page->post_name; //ページスラッグを取得?>
<div class="ly_cont ly_cont__<?php echo $slug; //ページスラッグをクラスに適用?>">
    <main id="primary" class="site-main ly_cont_main">

        <?php while ( have_posts() ) : the_post(); //START：メインループ ?>


        <?php get_template_part( 'template-parts/content/content', 'privacy' ); //コンテンツエリア読み込み ?>

        <?php endwhile; //END：メインループ ?>

    </main>

</div>
<!--/.ly_cont-->

<?php get_footer();//フッター読み込み