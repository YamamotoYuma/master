<?php
/*--------------------------------
 *	変数定義エリア
--------------------------------*/
if ($args['type']) {$postType = $args['type'];} else {$postType = 'post';}
if ($args['num']) {$postPerPage = $args['num'];} else {$postPerPage = 4;}
if ($args['taxonomy']) {$postTaxonomy = $args['taxonomy'];} else {$postTaxonomy = 'category';}
if ($args['term']) {$postTerms = $args['term'];} else {$postTerms = '';}
if ($args['current']) {$current = $args['current'];} else {$current = '';}

$currentTerm = get_the_terms($post->ID, $postTaxonomy);
if ( $currentTerm && ! is_wp_error( $currentTerm ) ) {
	$term = $currentTerm[0];
	if ( $term->parent ) { // 子
		$parentTerm = get_term( $term->parent, $postTaxonomy);
		$termSlug = esc_html( $parentTerm->slug );
	} else { // 親
		$termSlug = esc_html( $term->slug );
	}
}

if($current === 'on'){$postTerms = $termSlug;} //ショートコード第八引数が「on」ならばカレントタームに指定

/*--------------------------------
 *	クエリ定義エリア
--------------------------------*/
$args = array(
	'posts_per_page' => $postPerPage,
	'post__not_in'=> array(get_the_ID()),
	'paged' => get_query_var('paged'),
	'ignore_sticky_posts' => 1, //先頭固定表示機能を停止
	'orderby' => 'rand',
	'order' => $args['order'],
	'tax_query' => array(
		'relation' => 'AND',
	),
);

if(!empty($postTerms) || $current === 'on'){
	$tax_query1 = array(
		'taxonomy' =>$postTaxonomy,
		'field'=>'slug',
		'terms'=>$postTerms
	);
	array_push($args['tax_query'], $tax_query1);
}

/*--------------------------------
 *	ループ処理エリア
--------------------------------*/
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) : //A-1
?>

<ul class="bl_postCardUnit bl_postCardUnit__horize">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); //B-2 ?>

    <?php  get_template_part( 'template-parts/card/card','relation' ); //ブログカードをインク ?>

    <?php endwhile; //B-1 ?>
</ul>
<!-- ./bl_vertPosts -->

<?php endif; //A-1 ?>
<?php wp_reset_postdata(); //クエリリセット ?>