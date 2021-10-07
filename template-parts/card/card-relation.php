<?php
/**
 *  FileName: 投稿カード：関連
 *
 * @package WordPress
 */

?>

<li class="bl_cardRelation">
	<div class="bl_cardRelation_inner left ut_cardLayer">
		<a href="<?php the_permalink(); ?>" class="bl_cardRelation_layer"></a>
		<?php img_output_thumb( 'thumbnail' ); ?>
	</div>
	<!-- /.bl_cardRelation_inner.left -->
	<div class="bl_cardRelation_inner right ut_cardLayer">
		<a href="<?php the_permalink(); ?>" class="bl_cardRelation_layer"></a>
		<h6 class="bl_cardRelation_ttl">
			<a href="<?php the_permalink(); ?>">
				<?php echo esc_html( wp_trim_words( get_the_title(), 25, '…' ) ); // タイトル. ?>
			</a>
		</h6>
		<time class="bl_cardRelation_date" datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php the_time( 'Y年n月j日' ); ?></time>
	</div>
	<!-- /.bl_cardRelation_inner.right -->
</li>
