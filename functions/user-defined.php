<?php
/**
 * ユーザー定義関数
 *
 * @package WordPress
 */

/*
--------------------------------
 *  画像出力
--------------------------------
*/

/**
 * ------ サムネイル画像（figure > img） -------
 *
 * @param str $read comment.
 * @param str $size comment.
 */
function img_output_thumb( $read, $size = 'url' ) {
	$object = get_field( 'ad_noImage', 'option' );
	if ( 'url' === $size ) {
		$img    = get_the_post_thumbnail_url( $read->ID );
		$object = $object['url'];
	} else {
		$img    = get_the_post_thumbnail_url( $read->ID, $size );
		$object = $object['sizes'][ $size ];
	}
	if ( $img ) {
		$url = $img;
	} else {
		$url = $object;
	}
	?>
<figure>
	<img src="<?php echo esc_url( $url ); ?>" alt="サムネイル">
</figure>
	<?php
}

/**
 * ------ サムネイル画像（URL） -------
 *
 * @param str $read comment.
 * @param str $size comment.
 */
function img_output_thumb_url( $read, $size = 'url' ) {
	$object = get_field( 'ad_noImage', 'option' );
	if ( 'url' === $size ) {
		$img    = get_the_post_thumbnail_url( $read->ID );
		$object = $object['url'];
	} else {
		$img    = get_the_post_thumbnail_url( $read->ID, $size );
		$object = $object['sizes'][ $size ];
	}
	if ( $img ) {
		$url = $img;
	} else {
		$url = $object;
	}
	echo esc_url( $url );
}

/**
 * ------ ACF画像フィールド（figure > img） -------
 *
 * @param str $title comment.
 * @param str $size comment.
 * @param str $option comment.
 */
function img_output( $title, $size = 'url', $option = 'option' ) {
	$img = get_field( $title, $option );
	if ( $img ) {
		$object = $img;
	} else {
		$object = get_field( 'ad_noImage', 'option' );
	}
	if ( 'url' === $size ) {
		$url = $object['url'];
	} else {
		$url = $object['sizes'][ $size ];
	}
	$alt = $object['alt'];
	?>
<figure>
	<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
</figure>
	<?php
}

/**
 * ------ ACF画像フィールド（URL） -------
 *
 * @param str $title comment.
 * @param str $size comment.
 * @param str $option comment.
 */
function img_output_url( $title, $size = 'url', $option = 'option' ) {
	$img = get_field( $title, $option );
	if ( $img ) {
		$object = $img;
	} else {
		$object = get_field( 'ad_noImage', 'option' );
	}
	if ( 'url' === $size ) {
		$url = $object['url'];
	} else {
		$url = $object['sizes'][ $size ];
	}
	echo esc_url( $url );
}

/**
 * ------ ACF画像サブフィールド（figure > img） -------
 *
 * @param str $title comment.
 * @param str $size comment.
 */
function img_output_sub( $title, $size = 'url' ) {
	$img = get_sub_field( $title );
	if ( $img ) {
		$object = $img;
	} else {
		$object = get_field( 'ad_noImage', 'option' );
	}
	if ( 'url' === $size ) {
		$url = $object['url'];
	} else {
		$url = $object['sizes'][ $size ];
	}
	$alt = $object['alt'];
	?>
<figure>
	<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
</figure>
	<?php
}

/**
 * ------ ACF画像サブフィールド（URL） -------
 *
 * @param str $title comment.
 * @param str $size comment.
 */
function img_output_sub_url( $title, $size = 'url' ) {
	$img = get_sub_field( $title );
	if ( $img ) {
		$object = $img;
	} else {
		$object = get_field( 'ad_noImage', 'option' );
	}
	if ( 'url' === $size ) {
		$url = $object['url'];
	} else {
		$url = $object['sizes'][ $size ];
	}
	echo esc_url( $url );
}

/**
 * ------ ギャラリーフィールドの1枚目（figure > img） -------
 *
 * @param str $title comment.
 * @param str $size comment.
 * @param str $option comment.
 */
function gallery_first( $title, $size = 'url', $option = 'option' ) {
	$gallery = get_field( $title, $option );
	$object  = $gallery[0];
	if ( 'url' === $size ) {
		$url = $object['url'];
	} else {
		$url = $object['sizes'][ $size ];
	}
	$alt = $object['alt'];
	?>
<figure>
	<img class="js_mainPhoto" src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
</figure>
	<?php
}

/*
--------------------------------
 *  カラム制御（ページレイアウト）
--------------------------------
*/

/**
 * ------ カラム制御と連動してクラスを出力 -------
 *
 * @param str $tmp comment.
 */
function ly_cont__col( $tmp = 'dv_page' ) {
	if ( get_field( $tmp, 'option' ) ) {
		echo ' ly_cont__col';
	}
}

/**
 * ------ カラム制御と連動してサイドバーを出力 -------
 *
 * @param str $tmp comment.
 */
function set_sidebar( $tmp = 'dv_page' ) {
	if ( get_field( $tmp, 'option' ) ) {
		get_sidebar();
	}
}
