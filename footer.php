				<footer id="colophon" class="site-footer">
					<div class="ly_footer_wrapper">

						<div class="ly_footer">
							<div class="ly_footer_inner">
								<a href="<?php echo home_url() ;?>" class="el_siteTtl"><?php the_field( 'ad_companyName', 'option' ); //企業名?></a>
								<dl class="el_adminInfo">
									<dd class="el_adminInfo_data">〒<?php the_field( 'ad_postalCode', 'option' ); //郵便番号?>&nbsp<?php the_field( 'ad_location', 'option' ); //所在地?></dd>
									<dd class="el_adminInfo_data">TEL.<?php the_field( 'ad_phoneNumber', 'option' ); //電話番号?></dd>
									<dd class="el_adminInfo_data">受付時間：<?php the_field( 'ad_telInquiryTime', 'option' ); //電話問い合わせ時間?>［<?php the_field( 'ad_regularHoliday', 'option' ); //定休日?>］</dd>
								</dl>
							</div>
							<!-- /.ly_footer_inner -->
						</div>
						<!-- /.ly_footer -->
						
						<div class="ly_footer">
							<div class="ly_footer_inner">
								<small class="el_copyright"><?php the_field( 'ad_copyWright', 'option' ); //コピーライト?></small>
							</div
							><!-- /.ly_footer_inner -->
						</div>
						<!-- /.ly_footer -->

					</div>
					<!-- /.ly_footer_wrapper -->
				</footer>

			</div>
			<!-- /.ly_siteBody_inner -->

			<?php get_template_part( 'template-parts/parts/mobileMenu' ); //モバイルメニューをインク?>

			<div class="el_pageTop js_pageTop">
				<a href="#"></a>
			</div>
			<!-- ./bl_pageTop -->

		</div>
		<!-- /.ly_siteBody -->

		<?php wp_footer(); //フッターをインク?>

	</body>
</html>