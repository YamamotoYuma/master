<?php
/**
 * ページャー
 *
 * @package WordPress
 */

/*
--------------------------------
*  投稿メタデータの表示エリア
--------------------------------
*/
$taxonomy_slug     = array_keys( get_the_taxonomies() ); // 投稿の属するタクソノミーを取得.
$taxonomy_cat      = get_taxonomy( $taxonomy_slug[0] );
$post_taxonomy_cat = $taxonomy_cat->name; // カテゴリータイプ.
if ( 'relation' === $post_taxonomy_cat ) {
	$post_taxonomy_cat = null; // タグスラッグを拾ったら空の値を返す.
}
$taxonomy_tag      = get_taxonomy($taxonomy_slug[1]);
$post_taxonomy_tag = $taxonomy_tag->name; // タグタイプ.
?>
<?php if ( 'post' === get_post_type() ) : // A-1. ?>
<nav class="bl_postInfo">
	<ul class="bl_postInfo_inner">
		<li class="bl_postInfo_item">
			<time class="el_labelPostInfo el_labelPostInfo__beforeIcon_date">
				<?php esc_html( the_time( 'Y年n月j日' ) ); ?>
				<?php if ( get_the_time( 'Y年n月j日' ) !== get_the_modified_date('Y年n月j日')): // A-2. ?> / 最終更新日：<?php the_modified_date( 'Y年n月j日' ); ?>
				<?php endif; // A-2. ?>
			</time>
		</li>

		<?php if ( get_the_terms( $post->ID, $post_taxonomy_cat ) === $terms ) : // A-3. ?>
			<?php $tarm_link = get_term_link( $terms[0]->slug, $post_taxonomy_cat ); ?>
		<li class="bl_postInfo_item">
			<a class="el_labelPostInfo el_labelPostInfo__badgeCat" href="<?php echo esc_attr( $tarm_link ); ?>"><?php echo esc_html( $terms[0]->name ); // タームラベルを出力. ?></a>
		</li>
		<?php endif; // A-3. ?>
	</ul>

	<?php if ( get_the_terms( $post->ID, $post_taxonomy_tag ) === $terms ) : // A-4. ?>
	<!--タグが登録されていれば一覧を出力-->
	<ul class="bl_postInfo_inner hp_mt1e">
		<?php foreach ( $terms as $term ) : // B-1. ?>
		<li class="bl_postInfo_item">
			<?php $tar_link = get_term_link( $term->slug, $term->taxonomy ); ?>
			<a class="el_labelPostInfo el_labelPostInfo__badgeTag" href="<?php echo esc_attr( $tarm_link ); ?>"><?php echo esc_html( $term->name ); ?></a>
		</li>
		<?php endforeach; // B-1. ?>
	</ul>
	<?php endif; // A-4. ?>
</nav>
<?php endif; // A-1. ?>

<?php if ( get_post_type() === 'product' ) : // A-1. ?>
<nav class="bl_postInfo">
	<ul class="bl_postInfo_inner hp_mb1e">
		<?php if ( get_the_terms( $post->ID, $post_taxonomy_cat ) === $terms ) : // A-3. ?>
			<?php $tarm_link = get_term_link( $terms[0]->slug, $post_taxonomy_cat ); ?>
		<li class="bl_postInfo_item">
			<a class="el_labelPostInfo el_labelPostInfo__badgeCat" href="<?php echo esc_attr( $tarm_link ); ?>"><?php echo esc_html( $terms[0]->name ); // タームラベルを出力. ?></a>
		</li>
		<?php endif; // A-3. ?>
	</ul>

	<?php if ( get_the_terms( $post->ID, $post_taxonomy_tag ) === $terms ) : // A-4. ?>
	<!--タグが登録されていれば一覧を出力-->
	<ul class="bl_postInfo_inner hp_mb1e">
		<?php foreach ( $terms as $term ) : // B-1. ?>
		<li class="bl_postInfo_item">
			<?php $tarm_link = get_term_link( $term->slug, $term->taxonomy ); ?>
			<a class="el_labelPostInfo el_labelPostInfo__badgeTag" href="<?php echo esc_attr( $tarm_link ); ?>"><?php echo esc_html( $term->name ); ?></a>
		</li>
		<?php endforeach; // B-1. ?>
	</ul>
	<?php endif; // A-4. ?>
</nav>
<?php endif; // A-1. ?>
