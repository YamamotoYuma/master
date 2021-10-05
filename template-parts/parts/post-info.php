<?php
/**
 * FileName: 投稿メタデータ
 *
 * @package WordPress
 */

/*
--------------------------------
*  変数定義
--------------------------------
*/
$taxonomy_slug = array_keys( get_the_taxonomies() ); // 投稿の属するタクソノミーを取得.
foreach ( $taxonomy_slug as $key => $val ) { // F 特定条件で配列から除外.
	if ( 'relation' === $val ) {
		unset( $taxonomy_slug[ $key ] );
	}
} // F 特定条件で配列から除外.
$taxonomy_slug     = array_values( $taxonomy_slug ); // Indexを詰める.
$taxonomy_cat      = get_taxonomy( $taxonomy_slug[0] );
$post_taxonomy_cat = $taxonomy_cat->name; // カテゴリータイプタクソノミー.
$post_taxonomy_tag = 'relation'; // タグタイプタクソノミー（関連タグ）.

/*
--------------------------------
*  DOM生成
--------------------------------
*/
?>
<nav class="bl_postInfo">
	<ul class="bl_postInfo_inner">
		<li class="bl_postInfo_item">
			<time class="el_labelPostInfo el_labelPostInfo__beforeIcon_date">
				<?php esc_html( the_time( 'Y年n月j日' ) ); ?>
				<?php
				if ( get_the_time( 'Y年n月j日' ) !== get_the_modified_date( 'Y年n月j日' ) ) :
					// B.
					?>
					/ 最終更新日：<?php the_modified_date( 'Y年n月j日' ); ?>
				<?php endif; // B. ?>
			</time>
		</li>

		<?php
		$terms = get_the_terms( $post->ID, $post_taxonomy_cat ); // カテゴリータイプタームを格納.
		?>
		<?php if ( $terms && ! is_wp_error( $terms ) ) : // C. ?>
			<?php $tarm_link = get_term_link( $terms[0]->slug, $post_taxonomy_cat ); ?>
			<li class="bl_postInfo_item">
				<a class="el_labelPostInfo el_labelPostInfo__badgeCat" href="<?php echo esc_url( $tarm_link ); ?>"><?php echo esc_html( $terms[0]->name ); // タームラベルを出力. ?></a>
			</li>
		<?php endif; // C. ?>
	</ul>

	<?php
	$terms = get_the_terms( $post->ID, $post_taxonomy_tag ); // タグタイプタームを格納.
	?>
	<?php if ( $terms && ! is_wp_error( $terms ) ) : // D. ?>
		<ul class="bl_postInfo_inner hp_mt1e">
			<?php foreach ( $terms as $value ) : // E. ?>
			<li class="bl_postInfo_item">
				<?php $tarm_link = get_term_link( $value->slug, $value->taxonomy ); ?>
				<a class="el_labelPostInfo el_labelPostInfo__badgeTag" href="<?php echo esc_url( $tarm_link ); ?>"><?php echo esc_html( $value->name ); ?></a>
			</li>
			<?php endforeach; // E. ?>
		</ul>
	<?php endif; // D. ?>
</nav>
