<?php
/**
 *  FileName: サブループ（関連）
 *
 * @package WordPress
 */

/*
--------------------------------
 *	変数定義
--------------------------------
*/

if ( $args['type'] ) {
	$post_type_is = $args['type'];
} else {
	$post_type_is = 'post';}
if ( $args['num'] ) {
	$post_per_page = $args['num'];
} else {
	$post_per_page = 4;}
if ( $args['taxonomy'] ) {
	$post_taxonomy = $args['taxonomy'];
} else {
	$post_taxonomy = 'category';}
if ( $args['term'] ) {
	$post_terms = $args['term'];
} else {
	$post_terms = '';}
if ( $args['current'] ) {
	$current = $args['current'];
} else {
	$current = '';}

$current_term = get_the_terms( $post->ID, $post_taxonomy );
if ( $current_term && ! is_wp_error( $current_term ) ) {
	$value = $current_term[0];
	if ( $value->parent ) { // 子.
		$parent_term = get_term( $value->parent, $post_taxonomy );
		$term_slug   = esc_html( $parent_term->slug );
	} else { // 親.
		$term_slug = esc_html( $value->slug );
	}
}

if ( 'on' === $current ) {
	$post_terms = $term_slug;} //ショートコード第八引数が「on」ならばカレントタームに指定

/*
--------------------------------
 *	クエリ定義
--------------------------------
*/
$args = array(
	'posts_per_page'      => $post_per_page,
	'post__not_in'        => array( get_the_ID() ),
	'paged'               => get_query_var( 'paged' ),
	'ignore_sticky_posts' => 1, // 先頭固定表示機能を停止.
	'orderby'             => 'rand',
	'order'               => $args['order'],
	'tax_query'           => array(
		'relation' => 'AND',
	),
);

if ( ! empty( $post_terms ) || 'on' === $current ) {
	$tax_query1 = array(
		'taxonomy' => $post_taxonomy,
		'field'    => 'slug',
		'terms'    => $post_terms,
	);
	array_push( $args['tax_query'], $tax_query1 );
}

/*
--------------------------------
 *	ループ処理
--------------------------------
*/
?>
<?php $the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) : // A. ?>

	<ul class="bl_postCardUnit bl_postCardUnit__horize">

		<?php while ( $the_query->have_posts() ) : // B. ?>
			<?php $the_query->the_post(); ?>

			<?php get_template_part( 'template-parts/card/card', 'relation' ); // 投稿カード. ?>

		<?php endwhile; // B. ?>

	</ul>
	<!-- ./bl_vertPosts -->

<?php endif; // A. ?>

<?php wp_reset_postdata(); // クエリリセット. ?>
