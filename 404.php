<?php
/**
 *  File Name: 404テンプレート
 *
 * @package WordPress
 */

?>

<?php get_header(); // ヘッダー. ?>

<div class="ly_cont ly_cont__default ly_cont__404">
	<main id="primary" class="site-main ly_cont_main">

		<header class="page-header ly_sect_pageHeader">
			<h1 class="el_lv1Heading"><span>ページが見つかりませんでした。</span></h1>
		</header>

		<section class="ly_sect__single ly_sect_pageBody" style="text-align:center">
			<span class="el_afterIcon el_afterIcon__chevRight">
				<a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?>トップへ戻る</a>
			</span>
		</section>
		<!-- /.ly_sect_pageBody -->

	</main>

</div>
<!--/.ly_cont-->

<?php get_footer(); // フッター. ?>
