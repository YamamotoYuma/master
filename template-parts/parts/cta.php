<section class="ly_sect ly_sect__cta ut_fullWidthPadding" style="background-image:url('<?php img_output_url( 'cta_intro_img' ); ?>');">
    <div class="ly_sect__cta_inner left">
        <h2><?php the_field('cta_intro_h2','option'); //大見出し ?><span><?php the_field('cta_intro_h2_rubi','option');?></span></h2>
        <p><?php the_field('cta_intro_txt','option'); //導入文 ?></p>
        <dl class="el_telInfo">
            <dt class="el_telInfo_phoneNum">
                <a href="<?php the_field('ad_phonCallLink', 'option') ;?>" class="el_telInfo_phoneNum_layer">
                    <img class="el_beforeImgIcon" src="<?php echo get_stylesheet_directory_uri() ;?>/img/phone_white.svg" alt="電話"><?php the_field('ad_phoneNumber', 'option') ;?>
                </a>
                <!-- /.el_telInfo_phoneNum_layer -->
            </dt>
            <dd class="el_telInfo_receptionTime">受付時間　<?php the_field('ad_telInquiryTime', 'option') ;?>（土日祝除く）</dd>
        </dl>
    </div>
    <!-- /.ly_sect__cta_inner -->
    <div class="ly_sect__cta_inner right">
        <p><?php the_field('cta_mail_txt','option'); ?></p>
        <a class="el_btn el_btn__arrowRight" href="<?php the_field('ad_inquiryLink','option'); ?>"><?php the_field('cta_mail_btnTtl','option'); //ボタン：問い合わせ ?></a>
        <p><?php the_field('cta_dl_txt','option'); ?></p>
        <a class="el_btn el_btn__arrowRight" href="<?php the_field('ad_documentLink','option'); ?>"><?php the_field('cta_dl_btnTtl','option'); //ボタン：ダウンロード ?></a>

    </div>
    <!-- /.ly_sect__cta_inner -->

</section>
<!-- /.ly_sect ly_sect__cta -->