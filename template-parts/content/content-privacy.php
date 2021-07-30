<?php
/*--------------------------------
 *  コンテンツエリア（汎用）
--------------------------------*/
?>

<section class="ly_sect__single ly_sect__single_header">

	<?php  get_template_part('template-parts/parts/postInfo'); //投稿メタデータ出力 ?>

	<?php if ( is_singular() ) :?>
	<h1 class="el_lv2Heading el_lv2Heading__tbBorder"><?php the_title() ; //ポストタイトル?></h1>
	<?php else : ?>
	<h2 class="el_lv2Heading el_lv2Heading__tbBorder"><a href="<?php echo esc_url( get_permalink() ) ;?>" rel="bookmark"><?php the_title() //ポストタイトル;?></a></h2>
	<?php endif; //is_singular()?>

</section>
<!-- /.ly_sect_singleHeader -->

<article <?php post_class( array('ly_sect__single','ly_sect__single_main') ) ; ?> id="post-<?php the_ID(); ?>">
    <div class="entry-content bl_entryContent">
        <?php underscores_post_thumbnail(); ?>
        <?php
			
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'underscores' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscores' ),
					'after'  => '</div>',
				)
			);
			?>
    </div>
    <!-- /.bl_entryContent -->
</article>
<!-- /.ly_sect__single_main -->

<!-- #post-<?php the_ID(); ?> -->