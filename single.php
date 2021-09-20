<?php
/**
 *  FileName: シングルページ
 *
 * @package WordPress
 */

/*
--------------------------------
 *  変数定義
--------------------------------
*/
$area = 'sidebar-2'; // ウィジェットエリアの定義（デフォルト：[投稿コンテンツ下]）.
?>

<?php get_header(); // ヘッダー読み込み. ?>

<div class="ly_cont ly_cont__single<?php ly_cont__col( 'dv_single' ); // カラム制御. ?>">

	<main id="primary" class="site-main ly_cont_main">

		<?php while ( have_posts() ) : // メインループ. ?>
			<?php the_post(); ?>

			<?php get_template_part( 'template-parts/content/content', get_post_type() ); // 投稿コンテンツ. ?>

			<?php if ( is_active_sidebar( $area ) ) : // A ウィジェットエリアにウィジェットがあれば. ?>

				<section class="ly_sect__single ly_sect__widget">

					<?php dynamic_sidebar( $area ); // ウィジェットエリア. ?>

				</section>
				<!-- /.ly_sect ly_sect__widget -->

			<?php endif; // A ウィジェットエリアにウィジェットがあれば. ?>

			<?php get_template_part( 'template-parts/parts/pager', get_post_type() ); // ページャー. ?>

		<?php endwhile; // メインループ. ?>

	</main>

	<?php set_sidebar( 'dv_single' ); // サイドバー. ?>

</div>
<!--/.ly_cont-->

<?php get_footer(); // フッター. ?>
