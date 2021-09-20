<?php
/**
 *
 * Template Name:アーカイブテンプレート
 *
 *  @package WordPress
 */

?>

<?php get_header(); // ヘッダー. ?>

<div class="ly_cont ly_cont__archive<?php ly_cont__col( 'dv_archive' ); // カラム制御. ?>">

	<main id="primary" class="site-main ly_cont_main">

		<section class="ly_sect__archive ly_sect__archive_header">
			<h1 class="el_lv2Heading el_lv2Heading__tbBorder">
				<span>
					<?php the_archive_title(); // アーカイブタイトル. ?>
				</span>
			</h1>
		</section>

		<section class="ly_sect__archive ly_sect__archive_main">
			<?php if ( have_posts() ) : // A. ?>
			<ul class="bl_card_defaultUnit">
				<?php while ( have_posts() ) : // メインループ. ?>
					<?php the_post(); ?>

					<?php get_template_part( 'template-parts/card/card' ); // 投稿カード. ?>

				<?php endwhile; // メインループ. ?>
			</ul>
			<?php endif; // A. ?>
		</section>

		<?php get_template_part( 'template-parts/parts/pagenation' ); // ページネーション. ?>

	</main>

	<?php set_sidebar( 'dv_archive' ); // サイドバー. ?>

</div>
<!--/.ly_cont-->

<?php get_footer(); // フッター. ?>
