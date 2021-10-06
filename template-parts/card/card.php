<?php
/**
 *  FileName: 投稿カード
 *
 * @package WordPress
 */

/*
--------------------------------
 *  変数定義
--------------------------------
*/
$taxonomy_slug     = array_keys( get_the_taxonomies() ); // タクソノミーオブジェクトを全て取得.
$taxonomy_cat      = get_taxonomy( $taxonomy_slug[0] ); // 連想配列の先頭のタクソノミーオブジェクトを取得.
$post_taxonomy_cat = $taxonomy_cat->name; // カテゴリースラッグを抽出.
if ( 'relation' === $post_taxonomy_cat ) {
	$post_taxonomy_cat = null; // タグスラッグを拾ったら空の値を返す.
}
$terms = get_the_terms( $post->ID, $post_taxonomy_cat ) // .

/*
--------------------------------
 *  DOM生成
--------------------------------
*/
?>
<li class="bl_card clearfix">
	<a href="<?php the_permalink(); ?>" class="bl_card_layer"></a>
	<div class="bl_card_inner left">
		<?php img_output_thumb( 'thumbnail' ); ?>
	</div>
	<!-- /.bl_card_inner.left -->
	<div class="bl_card_inner right">
		<div class="bl_card_meta">
			<time class="el_labelPostInfo el_labelPostInfo__beforeIcon_date" datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php the_time( 'Y年n月j日' ); ?></time>
			<?php if ( $terms ) : // A. ?>
				<?php $tarm_link = get_term_link( $terms[0]->slug, $post_taxonomy_cat ); ?>
			<a class="el_labelPostInfo el_labelPostInfo__badgeCat" href="<?php echo esc_url( $tarm_link ); ?>"><?php echo esc_attr( wp_trim_words( esc_html( $terms[0]->name ), 6, '…' ) ); // タームラベル. ?></a>
			<?php else : ?>
			<span class="el_labelPostInfo el_labelPostInfo__badgeCat">未分類</span>
			<!-- /.el_labelBorder -->
			<?php endif; // A. ?>
		</div>
		<!-- /.bl_card_meta -->
		<h6 class="bl_card_ttl">
			<?php echo esc_attr( wp_trim_words( get_the_title(), 40, '…' ) ); // タイトル. ?>
		</h6>
		<p class="bl_card_excerpt"><?php the_excerpt(); ?></p>
	</div>
	<!-- /.bl_card_inner.right -->
</li>
