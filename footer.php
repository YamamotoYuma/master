<?php
/**
 *  FileName: フッターテンプレート
 *
 * @package WordPress
 */

/*
--------------------------------
 *	変数定義
--------------------------------
*/
$nav_left  = array( // フッターナビゲーション（左.
	'container'      => false,
	'menu_class'     => 'bl_vertNav',
	'theme_location' => 'footer-left',
);
$nav_right = array( // フッターナビゲーション（右.
	'container'      => false,
	'menu_class'     => 'bl_vertNav',
	'theme_location' => 'footer-right',
);

/*
--------------------------------
 *	DOM生成
--------------------------------
*/
?>

				<footer id="colophon" class="site-footer ly_footer_wrapper">

					<div class="ly_footer top">

						<div class="ly_footer_inner left">
							<div class="el_siteLogo_wrapper"><?php the_custom_logo(); // サイトロゴ. ?></div>
							<!-- /.el_siteLogo_wrapper -->
							<ul class="el_adminInfo">
								<li class="el_adminInfo_data">
									〒<?php the_field( 'ad_postalCode', 'option' ); // 郵便番号. ?>
									&nbsp;&nbsp;<?php the_field( 'ad_location', 'option' ); // 所在地. ?>
								</li>
								<li class="el_adminInfo_data">
									TEL:<?php the_field( 'ad_phoneNumber', 'option' ); // 電話番号. ?>
									&nbsp;&nbsp;FAX:<?php the_field( 'ad_faxNumber', 'option' ); // FAX番号. ?>
								</li>
							</ul>
							<?php get_template_part( 'template-parts/parts/sns' ); // SNS. ?>
						</div>
						<!-- /.ly_footer_inner -->

						<div class="ly_footer_inner right">
							<div class="bl_vertNavUnit">
								<?php wp_nav_menu( $nav_left ); // ナビ（左. ?>
								<?php wp_nav_menu( $nav_right ); // ナビ（右. ?>
							</div>
							<!-- /.bl_nav_footerUnit -->
						</div>
						<!-- /.ly_footer_inner right -->

					</div>
					<!-- /.ly_footer top -->

					<div class="ly_footer bottom">
						<small class="el_copyright"><?php the_field( 'ad_copyWright', 'option' ); // コピーライト. ?></small>
					</div>
					<!-- /.ly_footer bottom -->

				</footer>

			</div>
			<!-- /.ly_siteBody_inner -->

			<?php get_template_part( 'template-parts/parts/mobile-menu' ); // モバイルメニュー. ?>

			<div class="el_pageTop js_pageTop">
				<a href="#"></a>
			</div>
			<!-- ./el_pageTop ページトップへ戻る -->

		</div>
		<!-- /.ly_siteBody -->

		<?php wp_footer(); // フッター下エリア. ?>

	</body>
</html>
