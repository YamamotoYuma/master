<?php
/**
 *  FileName: SNSアイコン（フォローボタン）
 *
 * @package WordPress
 */

?>

<?php
if ( get_field( 'ad_sns_instagram', 'option' )
	|| get_field( 'ad_sns_facebook', 'option' )
	|| get_field( 'ad_sns_twitter', 'option' )
	|| get_field( 'ad_sns_youtube', 'option' )
	|| get_field( 'ad_sns_line', 'option' ) ) : // A.
	?>

<div class="bl_IconSns hp_mt20">

	<!--●instagram-->
	<?php if ( get_field( 'ad_sns_instagram', 'option' ) ) : // B. ?>
	<a href="<?php the_field( 'ad_sns_instagram', 'option' ); ?>" class="bl_IconSns_icon bl_IconSns_icon__insta" target="_blank">
		<div class="bl_IconSns_icon_inner bl_IconSns_icon_inner__insta"></div>
	</a>
	<?php endif; // B. ?>

	<!--●facebook-->
	<?php if ( get_field( 'ad_sns_facebook', 'option' ) ) : // C. ?>
	<a href="<?php the_field( 'ad_sns_facebook', 'option' ); ?>" class="bl_IconSns_icon bl_IconSns_icon__facebook" target="_blank">
		<div class="bl_IconSns_icon_inner bl_IconSns_icon_inner__facebook"></div>
	</a>
	<?php endif; // C. ?>

	<!--●twitter-->
	<?php if ( get_field( 'ad_sns_twitter', 'option' ) ) : // D. ?>
	<a href="<?php the_field( 'ad_sns_twitter', 'option' ); ?>" class="bl_IconSns_icon bl_IconSns_icon__twitter" target="_blank">
		<div class="bl_IconSns_icon_inner bl_IconSns_icon_inner__twitter"></div>
	</a>
	<?php endif; // D. ?>

	<!--●youtube-->
	<?php if ( get_field( 'ad_sns_youtube', 'option' ) ) : // E. ?>
	<a href="<?php the_field( 'ad_sns_youtube', 'option' ); ?>" class="bl_IconSns_icon bl_IconSns_icon__youtube" target="_blank">
		<div class="bl_IconSns_icon_inner bl_IconSns_icon_inner__youtube"></div>
	</a>
	<?php endif; // E. ?>

	<!--●line-->
	<?php if ( get_field( 'ad_sns_line', 'option' ) ) : // F. ?>
	<a href="<?php the_field( 'ad_sns_line', 'option' ); ?>" class="bl_IconSns_icon bl_IconSns_icon__line" target="_blank">
		<div class="bl_IconSns_icon_inner bl_IconSns_icon_inner__line"></div>
	</a>
	<?php endif; // F. ?>

</div>

<?php endif; // A. ?>
