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
/*------ カテゴリータイプタクソノミーと関連タグ（relation）タクソノミーを仕分けする -------*/
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

/*------ タームを格納 -------*/
$terms     = get_the_terms( $post->ID, $post_taxonomy_cat ); // カテゴリータイプタクソノミーのタームを格納.
$terms_tag = get_the_terms( $post->ID, $post_taxonomy_tag ); // タグタイプタクソノミーのタームを格納.

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
				if ( get_the_time( 'Y年n月j日' ) !== get_the_modified_date( 'Y年n月j日' ) ) { // 記事が更新されたら更新日を出力.
					echo '/ 最終更新日：';
					the_modified_date( 'Y年n月j日' );
				}
				?>
			</time>
		</li>

		<?php if ( $terms && ! is_wp_error( $terms ) ) : // Cカテゴリータイプタクソノミーのタームがあれば出力. ?>
			<?php $tarm_link = get_term_link( $terms[0]->slug, $post_taxonomy_cat ); ?>
			<li class="bl_postInfo_item">
				<a class="el_labelPostInfo el_labelPostInfo__badgeCat" href="<?php echo esc_url( $tarm_link ); ?>"><?php echo esc_html( $terms[0]->name ); ?></a>
			</li>
		<?php endif; // C. ?>
	</ul>

	<?php if ( $terms_tag && ! is_wp_error( $terms_tag ) ) : // Dタグタイプタクソノミーのタームがあれば出力. ?>
		<ul class="bl_postInfo_inner hp_mt1e">
			<?php foreach ( $terms_tag as $value_tag ) : // E. ?>
			<li class="bl_postInfo_item">
				<?php $tarm_link_tag = get_term_link( $value_tag->slug, $value_tag->taxonomy ); ?>
				<a class="el_labelPostInfo el_labelPostInfo__badgeTag" href="<?php echo esc_url( $tarm_link_tag ); ?>"><?php echo esc_html( $value_tag->name ); ?></a>
			</li>
			<?php endforeach; // E. ?>
		</ul>
	<?php endif; // D. ?>
</nav>
