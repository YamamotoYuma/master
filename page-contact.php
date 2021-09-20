<?php
/**
 *  Template Name: コンタクトページ
 *
 * @package WordPress
 */

/*
--------------------------------
 *  変数定義
--------------------------------
*/
$page_id = get_post( get_the_ID() );
$slug    = $page_id->post_name; // ページスラッグを取得.

/*
--------------------------------
 *	DOM生成
--------------------------------
*/
?>
<?php get_header(); // ヘッダー. ?>

<div class="ly_cont ly_cont__<?php echo esc_attr( $slug ); ?><?php ly_cont__col(); // カラム制御. ?>">
	<main id="primary" class="site-main ly_cont_main">

		<?php while ( have_posts() ) : // メインループ. ?>
			<?php the_post(); ?>

			<?php get_template_part( 'template-parts/content/content', 'contact' ); // 投稿コンテンツ. ?>

		<?php endwhile; // メインループ. ?>

	</main>

	<?php set_sidebar(); // サイドバー. ?>

</div>
<!--/.ly_cont-->

<?php get_footer(); // フッター. ?>
