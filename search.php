<?php get_header(); ?>
<div class="ly_cont<?php if ( get_field('dv_archive','option') ) { echo ' ly_cont__col'; } ?> ly_cont__archive">
    <main id="primary" class="site-main ly_cont_main">

        <?php if ( have_posts() ) : ?>

        <section class="ly_sect__archive ly_sect__archive_header">
			<h1 class="el_lv2Heading el_lv2Heading__tbBorder">
				<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'underscores' ), '<span>' . get_search_query() . '</span>' );
					?>
			</h1>
		</section>

        <section class="ly_sect__archive ly_sect__archive_main">
			<ul class="bl_card_defaultUnit">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/card/card' );



				endwhile;?>
			</ul>
			<?php the_posts_navigation();

			else :

				get_template_part( 'template-parts/content/content', 'none' );

			endif;
			?>
		</section>

        <?php if (function_exists('responsive_pagination')) { responsive_pagination($additional_loop->max_num_pages); } //ページネーション?>

    </main>

    <?php if ( get_field('dv_archive','option') ) { get_sidebar(); } //サイドバー読み込み?>

</div>
<!--/.ly_cont-->

<?php get_footer();//フッター読み込み