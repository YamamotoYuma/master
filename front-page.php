<?php get_header(); //ヘッダー読み込み?>
<?php $page = get_post( get_the_ID() ); $slug = $page->post_name; //ページスラッグを取得?>
<div class="ly_cont ly_cont__<?php echo $slug; ?><?php if ( get_field('dv_page','option') ) { echo ' ly_cont__col'; } ?>">
	<main id="primary" class="site-main ly_cont_main">

		<?php while ( have_posts() ) : the_post();?>

			

			<section class="ly_cont_vertPosts">
				<div class="ly_cont_vertPosts_header">
					<h2 class="uq_newsTtl">NEWS</h2>
					<a href="#" class="el_label el_label__more">もっと見る<i class="fas fa-angle-right"></i></a>
				</div>
				<?php
				$args = [ //sub.phpのパラメーターを指定
					// 'type' => 'post', //投稿タイプスラッグを入力する
					// 'num' => '4', //表示したい記事数を数字で入力する
					// 'taxonomy' => 'category', //該当タクソノミーを入力する
					// 'term' => '', //タームを限定する場合タームスラッグを入力
					// 'orderby' => 'date', //並び順を指定
					// 'order' => 'DESC', //昇順（ASC）か降順（DESC）で指定
					// 'current' => '', //'on'もしくは''を入力 'on'なら同一タームに限定する
				]?>
				
				<?php get_template_part( 'template-parts/sub', '', $args ); //サブループをインク
				?>
			</section>
			
			


		<?php endwhile; ?>

	</main>

	<?php if ( get_field('dv_page','option') ) { get_sidebar(); } //サイドバー読み込み?>
</div>
<!--/.ly_cont-->
<?php get_footer();//フッター読み込み
