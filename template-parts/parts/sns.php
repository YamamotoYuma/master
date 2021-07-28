<?php
/*--------------------------------
*   SNSアイコン（フォローボタン）
--------------------------------*/
if ( get_field( 'ad_sns_instagram','option' )
|| get_field( 'ad_sns_facebook','option' )
|| get_field( 'ad_sns_twitter','option' )
|| get_field( 'ad_sns_youtube','option' )
|| get_field( 'ad_sns_line','option' ) ): //A-1 ?>

<div class="bl_IconSns hp_mt20">

    <!--●instagram-->
    <?php if(get_field('ad_sns_instagram','option')): ?>
    <a href="<?php the_field('ad_sns_instagram','option'); ?>" class="bl_IconSns_icon bl_IconSns_icon__insta" target="_blank">
        <div class="bl_IconSns_icon_inner bl_IconSns_icon_inner__insta"></div>
    </a>
    <?php endif; ?>

    <!--●facebook-->
    <?php if(get_field('ad_sns_facebook','option')): ?>
    <a href="<?php the_field('ad_sns_facebook','option'); ?>" class="bl_IconSns_icon bl_IconSns_icon__facebook" target="_blank">
        <div class="bl_IconSns_icon_inner bl_IconSns_icon_inner__facebook"></div>
    </a>
    <?php endif; ?>

    <!--●twitter-->
    <?php if(get_field('ad_sns_twitter','option')): ?>
    <a href="<?php the_field('ad_sns_twitter','option'); ?>" class="bl_IconSns_icon bl_IconSns_icon__twitter" target="_blank">
        <div class="bl_IconSns_icon_inner bl_IconSns_icon_inner__twitter"></div>
    </a>
    <?php endif; ?>

    <!--●youtube-->
    <?php if(get_field('ad_sns_youtube','option')): ?>
    <a href="<?php the_field('ad_sns_youtube','option'); ?>" class="bl_IconSns_icon bl_IconSns_icon__youtube" target="_blank">
        <div class="bl_IconSns_icon_inner bl_IconSns_icon_inner__youtube"></div>
    </a>
    <?php endif; ?>

    <!--●line-->
    <?php if(get_field('ad_sns_line','option')): ?>
    <a href="<?php the_field('ad_sns_line','option'); ?>" class="bl_IconSns_icon bl_IconSns_icon__line" target="_blank">
        <div class="bl_IconSns_icon_inner bl_IconSns_icon_inner__line"></div>
    </a>
    <?php endif; ?>

</div>
<?php endif; //A-1 ?>