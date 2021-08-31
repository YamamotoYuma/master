<?php
/**
 *  コンテンツエリア（汎用）
 *
 * @package WordPress
 */

/*
--------------------------------
 *  変数定義（ get_template_part()の第3引数にて配列で指定 ）
--------------------------------
*/
if ( $args['type'] ) {
	$post_type = $args['type'];
} else {
	$post_type = 'post';}
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

/*------ 関連記事を選別 -------*/
$current_term = get_the_terms( $post->ID, $post_taxonomy );
if ( $current_term && ! is_wp_error( $current_term ) ) {
	$term = $current_term[0];
	if ( $term->parent ) { // 子.
		$parent_term = get_term( $term->parent, $post_taxonomy );
		$term_slug   = esc_html( $parent_term->slug );
	} else { // 親.
		$term_slug = esc_html( $term->slug );
	}
}
if ( 'on' === $current ) {
	$post_terms = $term_slug;}

/*
--------------------------------
 *  クエリ指定
--------------------------------
*/
$args = array(
	'post_type'           => $postType,
	'posts_per_page'      => $post_per_page,
	'post__not_in'        => array( get_the_ID() ),
	'paged'               => get_query_var( 'paged' ),
	'ignore_sticky_posts' => 1, // 先頭固定表示機能を停止.
	'orderby'             => $args['orderby'],
	'order'               => $args['order'],
	'tax_query'           => array(
		'relation' => 'AND',
	),
);

/*------ タクソノミークエリを追加 -------*/
if ( ! empty( $post_terms ) ) {
	$tax_query1 = array(
		'taxonomy' => $post_taxonomy,
		'field'    => 'slug',
		'terms'    => $post_terms,
	);
	array_push( $args['tax_query'], $tax_query1 );
}

/*
--------------------------------
 *  ループ処理
--------------------------------
*/
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
	?>

<ul class="bl_cardPostUnit">
	<?php
	while ( $the_query->have_posts() ) :
		$the_query->the_post(); // 繰り返し処理開始.
		?>

		<?php get_template_part( 'template-parts/card/card' ); // ブログカードをインク. ?>

	<?php endwhile; // 繰り返し終了. ?>
</ul>
<!-- ./ bl_cardPostUnit -->

<?php else : // 条件分岐：投稿が無い場合は. ?>

<div class="uq_postNotFound_wrapper">
	<div class="uq_postNotFound">準備中</div>
</div>
<!--./ uq_postNotFound_wrapper -->

<?php endif; // 条件分岐終了. ?>
<?php wp_reset_postdata(); // クエリリセット. ?>
