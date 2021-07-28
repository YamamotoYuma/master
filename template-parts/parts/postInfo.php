<?php
/*--------------------------------
 *  投稿メタデータの表示エリア
--------------------------------*/
$taxonomy_slug = array_keys(get_the_taxonomies()); //投稿の属するタクソノミーを取得
$taxonomyCat = get_taxonomy($taxonomy_slug[0]);
$postTaxonomyCat = $taxonomyCat->name; //カテゴリータイプ
if( $postTaxonomyCat == 'relation' ) {
    $postTaxonomyCat = null; //タグスラッグを拾ったら空の値を返す
}
$taxonomyTag = get_taxonomy($taxonomy_slug[1]);
$postTaxonomyTag = $taxonomyTag->name; //タグタイプ
?>
<?php if ( 'post' === get_post_type() ) : //A-1 ?>
<nav class="bl_postInfo">
    <ul class="bl_postInfo_inner">
        <li class="bl_postInfo_item">
            <time class="el_labelPostInfo el_labelPostInfo__beforeIcon_date">
                <?php the_time('Y年n月j日');?>
                <?php if(get_the_time('Y年n月j日') != get_the_modified_date('Y年n月j日')): //A-2 ?> / 最終更新日：<?php the_modified_date('Y年n月j日'); ?>
                <?php endif; //A-2 ?>
            </time>
        </li>

        <?php if($terms = get_the_terms($post->ID, $postTaxonomyCat)) : //A-3 ?>
        <?php $tarmLink = get_term_link($terms[0]->slug, $postTaxonomyCat); ?>
        <li class="bl_postInfo_item">
            <a class="el_labelPostInfo el_labelPostInfo__badgeCat" href="<?php echo $tarmLink; ?>"><?php echo esc_html($terms[0]->name); //タームラベルを出力 ?></a>
        </li>
        <?php endif; //A-3 ?>
    </ul>

    <?php if($terms = get_the_terms($post->ID, $postTaxonomyTag)) : //A-4 ?>
    <!--タグが登録されていれば一覧を出力-->
    <ul class="bl_postInfo_inner hp_mt1e">
        <?php foreach ( $terms as $term ): //B-1 ?>
        <li class="bl_postInfo_item">
            <?php $tarmLink = get_term_link($term->slug,$term->taxonomy);?>
            <a class="el_labelPostInfo el_labelPostInfo__badgeTag" href="<?php echo $tarmLink;?>"><?php echo esc_html($term->name);?></a>
        </li>
        <?php endforeach ; //B-1 ?>
    </ul>
    <?php endif; //A-4 ?>
</nav>
<?php endif; //A-1 ?>

<?php if ( 'product' === get_post_type() ) : //A-1 ?>
<nav class="bl_postInfo">
    <ul class="bl_postInfo_inner hp_mb1e">
        <?php if($terms = get_the_terms($post->ID, $postTaxonomyCat)) : //A-3 ?>
        <?php $tarmLink = get_term_link($terms[0]->slug, $postTaxonomyCat); ?>
        <li class="bl_postInfo_item">
            <a class="el_labelPostInfo el_labelPostInfo__badgeCat" href="<?php echo $tarmLink; ?>"><?php echo esc_html($terms[0]->name); //タームラベルを出力 ?></a>
        </li>
        <?php endif; //A-3 ?>
    </ul>

    <?php if($terms = get_the_terms($post->ID, $postTaxonomyTag)) : //A-4 ?>
    <!--タグが登録されていれば一覧を出力-->
    <ul class="bl_postInfo_inner hp_mb1e">
        <?php foreach ( $terms as $term ): //B-1 ?>
        <li class="bl_postInfo_item">
            <?php $tarmLink = get_term_link($term->slug,$term->taxonomy);?>
            <a class="el_labelPostInfo el_labelPostInfo__badgeTag" href="<?php echo $tarmLink;?>"><?php echo esc_html($term->name);?></a>
        </li>
        <?php endforeach ; //B-1 ?>
    </ul>
    <?php endif; //A-4 ?>
</nav>
<?php endif; //A-1 ?>