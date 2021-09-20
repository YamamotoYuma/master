<?php
/**
 *  FileName: フロントページ用ファイル
 *
 * @package WordPress
 */

?>

<?php get_header(); // ヘッダー読み込み. ?>
<?php
$page_id = get_post( get_the_ID() );
$slug    = $page->post_name; // ページスラッグを取得.
$args    = array(
	'type' => 'news',
	'num'  => 3,
);
?>
<div class="ly_cont ly_cont__<?php echo esc_attr( $slug ); ?>
<?php
if ( get_field( 'dv_page', 'option' ) ) {
	echo ' ly_cont__col';
}
?>
">
	<main id="primary" class="site-main ly_cont_main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part( 'template-parts/sub/sub', '', $args ); // サブループ. ?>
		<?php endwhile; ?>

	</main>

	<?php
	if ( get_field( 'dv_page', 'option' ) ) {
		get_sidebar(); } //サイドバー読み込み.
	?>
</div>
<!--/.ly_cont-->
<?php
get_footer();// フッター読み込み.
