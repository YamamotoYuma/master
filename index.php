<?php
/**
 * The main template file
 *
 * @package WordPress
 */

?>

<?php get_header(); // ヘッダーをインク. ?>

<div class="ly_cont ly_cont__col<?php ly_cont__col( 'dv_archive' ); // カラム制御. ?>">

	<main id="primary" class="site-main ly_cont_main">
				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
						<?php
					endif;
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</main>

	<?php
	if ( get_field( 'dv_archive', 'option' ) ) {
		get_sidebar(); } //サイドバー読み込み
	?>

</div>
<!--/.ly_cont-->

<?php get_footer();// フッター読み込み. ?>
