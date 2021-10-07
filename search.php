<?php
/**
 *  File Name: 検索結果テンプレート
 *
 * @package WordPress
 */

/*
--------------------------------
 *	変数定義
--------------------------------
*/
if ( 'post' !== get_post_type() ) {
	$card       = get_post_type(); // カスタム投稿タイプのスラッグを取得.
	$card_class = '_' . $card; // カードタイプ（class）を格納.
}
?>

<?php get_header(); // ヘッダー. ?>

<div class="ly_cont ly_cont__default ly_cont__archive<?php ly_cont__col( 'dv_archive' ); // カラム制御. ?>">

	<main id="primary" class="site-main ly_cont_main">

		<?php if ( have_posts() ) : // A. ?>

			<section class="ly_sect__archive ly_sect__archive_header">
				<h1 class="el_lv2Heading el_lv2Heading__tbBorder">
					<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'underscores' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</section>

			<section class="ly_sect__archive ly_sect__archive_main">
				<ul class="bl_cardUnit<?php echo esc_attr( $card_class ); // カードタイプ（class）を指定. ?>">
					<?php while ( have_posts() ) : // メインループ. ?>
						<?php the_post(); ?>

						<?php get_template_part( 'template-parts/card/card', $card ); // 投稿カード. ?>

					<?php endwhile; // メインループ. ?>
				</ul>
				<?php the_posts_navigation(); ?>

			</section>

		<?php else : // A. ?>

			<?php get_template_part( 'template-parts/content/content', 'none' ); ?>

		<?php endif; // A. ?>

		<?php get_template_part( 'template-parts/parts/pagenation' ); // ページネーション. ?>

	</main>

	<?php set_sidebar( 'dv_archive' ); // サイドバー. ?>

</div>
<!--/.ly_cont-->

<?php get_footer(); // フッター. ?>
