<?php
/*--------------------------------
 *  ページャー（前の記事、次の記事）
--------------------------------*/
$prevpost = get_adjacent_post(false, '', true); //前の記事オブジェクト取得
$nextpost = get_adjacent_post(false, '', false); //次の記事オブジェクト取得
if ('post' === get_post_type() ) {
    $postTaxonomy = 'category'; //デフォルトタクソノミー取得
} else {
    $postTaxonomy = get_post_type()."cat"; //カスタムタクソノミー取得
}
$count = 25; //投稿タイトル最大文字数指定

if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき
?>

<section class="ly_sect__single ly_sect__pager">
    <div class="bl_pager_wrapper" <?php if(!$prevpost){ echo " style='justify-content:flex-end;'";}?>>
        <?php if($prevpost) :?>
        <div class="bl_pager prev">
            <a href="<?php echo get_the_permalink( $prevpost -> ID ); ?>" class="bl_pager_layer"></a>
            <div class="bl_pager_inner thumb">
                <?php if( $terms = get_the_terms( $prevpost->ID, $postTaxonomy ) ) : //A-1 ?>
                <span><?php echo esc_html( $terms[0] -> name );?></span>
                <?php endif; //A-1 ?>
                <?php img_output_thumb( $prevpost ,'medium') ; ?>
            </div>
            <!-- /.bl_pager_inner -->
            <div class="bl_pager_inner cont">
                <p>前の記事</p>
                <h5>
                    <?php //投稿タイトル
                    if( mb_strlen( $prevpost -> post_title ) > $count ) {
                        $prevtitle = mb_substr( $prevpost -> post_title, 0, $count );
                        echo $prevtitle.'…';
                    } else {
                        echo $prevpost -> post_title;
                    }
                    ?>
                </h5>
                <time> <?php echo get_the_time( 'Y年n月j日', $prevpost->ID ); ?></time>
            </div>
            <!-- /.bl_pager_inner -->
        </div>
        <!-- /.bl_pager.prev -->
        <?php endif ;?>

        <?php if($nextpost) :?>
        <div class="bl_pager next">
            <a href="<?php echo get_the_permalink( $nextpost -> ID ); ?>" class="bl_pager_layer"></a>
            <div class="bl_pager_inner thumb">
                <?php if( $terms = get_the_terms( $nextpost->ID, $postTaxonomy ) ) : //A-2 ?>
                <span><?php echo esc_html( $terms[0] -> name );?></span>
                <?php endif; //A-2 ?>
                <?php img_output_thumb( $nextpost ,'medium') ; ?>
            </div>
            <!-- /.bl_pager_inner -->
            <div class="bl_pager_inner cont">
                <p>次の記事</p>
                <h5>
                    <?php //投稿タイトル
                    if( mb_strlen( $nextpost -> post_title ) > $count ) {
                        $nexttitle = mb_substr( $nextpost -> post_title, 0, $count );
                        echo $nexttitle.'…';
                    } else {
                        echo $nextpost -> post_title;
                    }
                    ?>
                </h5>
                <time> <?php echo get_the_time( 'Y年n月j日', $nextpost->ID ); ?></time>
            </div>
            <!-- /.bl_pager_inner -->
        </div>
        <!-- /.bl_pager.next -->
        <?php endif ;?>

    </div>
    <!-- /.bl_prevNext -->
</section>
<!-- /.ly_sect ly_sect__pager -->

<?php } ;?>