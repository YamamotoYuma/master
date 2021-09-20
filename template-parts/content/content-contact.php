<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Underscores
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="ly_sect_pageHerder entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- /.ly_sect_pageHerder -->

	<?php underscores_post_thumbnail(); ?>
	<section class="ly_sect_singleBody">
		<div class="entry-content bl_entryContent">
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscores' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
		<!-- /.bl_entryContent -->
	</section>
	<!-- /.ly_sect_singleBody -->

</article>
