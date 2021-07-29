<?php
$page = get_post( get_the_ID() );
$slug = $page->post_name; //ページスラッグを取得
$contact = '[contact-form-7 id="8" html_id="inline-validation-engine"]' //contactform7ショートコード取得
?>

<?php get_header(); //ヘッダー読み込み?>

<div class="ly_cont ly_cont__<?php echo $slug; ?>">
	<main id="primary" class="site-main ly_cont_main">

		<?php while ( have_posts() ) : the_post(); ?>

            <section class="ly_sect ly_sect__contact">
                <header class="page-header ly_sect_pageHeader">
                    <h1 class=""><span><?php the_title(); //ページタイトル ?></span></h1>
                </header>

				<?php echo apply_filters('the_content', $contact); //contactform7呼び出し;?>
                
			</section>
            <!-- /.ly_sect__contact -->
		<?php endwhile; // have_posts() ?>

	</main>

	<?php //get_sidebar(); //サイドバー読み込み（コメントアウトで1カラムレイアウトへ） ;?>
</div>
<!--/.ly_cont-->

<?php get_footer();//フッター読み込み
