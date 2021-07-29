<?php
/*--------------------------------
    ページネーション生成
--------------------------------*/
function responsive_pagination($pages = '', $range = 4){
  $showitems = ($range * 2)+1;

  global $paged;
  if(empty($paged)) $paged = 1;

  //ページ情報の取得
  if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages){
      $pages = 1;
    }
  }

  if(1 != $pages) {
    echo '<section class="ly_sect__archive ly_sect__archive_pagenation"><nav class="bl_pagenation"><ul class="bl_pagenation_inner" role="menubar" aria-label="Pagination">';
    //先頭へ
    echo '<li class="first"><a class="bl_pagenation_link" href="'.get_pagenum_link(1).'"><i class="fas fa-angle-double-left"></i></a></li>';
    //1つ戻る
    echo '<li class="previous"><a class="bl_pagenation_link" href="'.get_pagenum_link($paged - 1).'"><i class="fas fa-angle-left"></i></a></li>';
    //番号つきページ送りボタン
    for ($i=1; $i <= $pages; $i++)     {
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))       {
        echo ($paged == $i)? '<li><span class="bl_pagenation_link is_active">'.$i.'</span></li>':'<li><a class="bl_pagenation_link" href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a></li>';
      }
    }
    //1つ進む
    echo '<li class="next"><a class="bl_pagenation_link" href="'.get_pagenum_link($paged + 1).'"><i class="fas fa-angle-right"></i></a></li>';
    //最後尾へ
    echo '<li class="last"><a class="bl_pagenation_link" href="'.get_pagenum_link($pages).'"><i class="fas fa-angle-double-right"></i></a></li>';
    echo '</ul></nav></section>';
  }
}

/*--------------------------------
 *  画像出力
--------------------------------*/
/*------ サムネイル画像（figure > img） -------*/
function img_output_thumb( $read, $size = 'url' ) {
  $object = get_field( 'ad_noImage', 'option' );
  if ($size == 'url') {
    $img = get_the_post_thumbnail_url( $read->ID );
    $object = esc_attr( $object['url'] );
  } else {
    $img = get_the_post_thumbnail_url( $read->ID,$size );
    $object = esc_attr( $object['sizes'][$size] );
  }
  if ( $img ) {
    $url = $img;
  } else {
    $url = $object;
  }
?>
<figure>
    <img src="<?php echo $url; ?>" alt="サムネイル">
</figure>
<?php }

/*------ サムネイル画像（URL） -------*/
function img_output_thumb_url( $read, $size = 'url' ) {
  $object = get_field( 'ad_noImage', 'option' );
  if ($size == 'url') {
    $img = get_the_post_thumbnail_url( $read->ID );
    $object = esc_attr( $object['url'] );
  } else {
    $img = get_the_post_thumbnail_url( $read->ID,$size );
    $object = esc_attr( $object['sizes'][$size] );
  }
  if ( $img ) {
    $url = $img;
  } else {
    $url = $object;
  }
  echo $url;
}

/*------ ACF画像フィールド（figure > img） -------*/
function img_output( $title, $size = 'url', $option = 'option' ) {
  $img = get_field( $title, $option);
  if ( $img ) {
    $object = $img;
  } else {
    $object = get_field( 'ad_noImage','option' );
  }
  if ($size == 'url') {
    $url = esc_attr( $object['url'] );
  } else {
    $url = esc_attr( $object['sizes'][$size] );
  }
  $alt = esc_attr( $object['alt'] );
?>
<figure>
    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
</figure>
<?php
}

/*------ ACF画像フィールド（URL） -------*/
function img_output_url( $title, $size = 'url', $option = 'option' ) {
  $img = get_field( $title, $option);
  if ( $img ) {
    $object = $img;
  } else {
    $object = get_field( 'ad_noImage','option' );
  }
  if ( $size == 'url' ) {
    $url = esc_attr( $object['url'] );
  } else {
    $url = esc_attr( $object['sizes'][$size] );
  }
  echo $url;
}

/*------ ACF画像サブフィールド（figure > img） -------*/
function img_output_sub($title, $size = 'url') {
  $img = get_sub_field( $title );
  if ( $img ) {
    $object = $img;
  } else {
    $object = get_field( 'ad_noImage','option' );
  }
  if ( $size == 'url' ) {
    $url = esc_attr( $object['url'] );
  } else {
    $url = esc_attr( $object['sizes'][$size] );
  }
  $alt = esc_attr( $object['alt'] );
?>
<figure>
    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
</figure>
<?php
}

/*------ ACF画像サブフィールド（URL） -------*/
function img_output_sub_url( $title, $size = 'url' ) {
  $img = get_sub_field( $title );
  if ( $img ) {
    $object = $img;
  } else {
    $object = get_field( 'ad_noImage','option' );
  }
  if ( $size == 'url' ) {
    $url = esc_attr( $object['url'] );
  } else {
    $url = esc_attr( $object['sizes'][$size] );
  }
  echo $url;
}

/*------ ギャラリーフィールドの1枚目（figure > img） -------*/
function gallery_first($title, $size = 'url', $option = 'option' ) {
  $gallery = get_field( $title, $option );
  $object = $gallery[0];
  if ( $size == 'url' ) {
    $url = esc_attr( $object['url'] );
  } else {
    $url = esc_attr( $object['sizes'][$size] );
  }
  $alt = esc_attr( $object['alt'] );
?>
<figure>
    <img class="js_mainPhoto" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
</figure>
<?php
}