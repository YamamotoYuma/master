<?php
/*--------------------------------
 *  変数定義
--------------------------------*/
$taxonomy_slug = array_keys(get_the_taxonomies()); //タクソノミーオブジェクトを全て取得
$taxonomyCat = get_taxonomy($taxonomy_slug[0]); //連想配列の先頭のタクソノミーオブジェクトを取得
$postTaxonomyCat = $taxonomyCat->name; //カテゴリースラッグを抽出
if( $postTaxonomyCat == 'relation' ) {
    $postTaxonomyCat = null; //タグスラッグを拾ったら空の値を返す
}

/*--------------------------------
 *  DOM生成
--------------------------------*/
?>
<li class="bl_card_default clearfix">
    <a href="<?php the_permalink();?>" class="bl_card_default_layer"></a>
    <div class="bl_card_default_inner left">
        <?php img_output_thumb( $page, 'thumbnail' ) ; ?>
    </div>
    <!-- /.bl_card_default_inner.left -->
    <div class="bl_card_default_inner right">
        <div class="bl_card_default_meta">
            <time class="el_labelPostInfo el_labelPostInfo__beforeIcon_date" datetime="<?php echo get_the_date('Y-m-d');?>"><?php the_time('Y年n月j日');?></time>
            <?php if($terms = get_the_terms($post->ID, $postTaxonomyCat)) : //A ?>
            <?php $tarmLink = get_term_link($terms[0]->slug, $postTaxonomyCat); ?>
            <a class="el_labelPostInfo el_labelPostInfo__badgeCat" href="<?php echo $tarmLink; ?>"><?php echo wp_trim_words(esc_html($terms[0]->name), 6, '…' ); //タームラベル ?></a>
            <?php else: ?>
            <span class="el_labelPostInfo el_labelPostInfo__badgeCat">未分類</span>
            <!-- /.el_labelBorder -->
            <?php endif; //A ?>
        </div>
        <!-- /.bl_card_default_meta -->
        <h6 class="bl_card_default_ttl">
            <?php echo wp_trim_words( get_the_title(), 40, '…' ); //タイトル?>
        </h6>
        <p class="bl_card_default_excerpt"><?php the_excerpt(); ?></p>
    </div>
    <!-- /.bl_card_default_inner.right -->
</li>