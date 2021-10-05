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
 * @param str $size 画像サイズ.
 * @param str $read 投稿ID（空欄で現在の投稿）.
 * @param str $cls 固有クラス名の指定.
 */
function img_output_thumb( $size = 'url', $read = '', $cls = '' ) {
	$object = get_field( 'ad_noImage', 'option' );
	if ( 'url' === $size ) {
		$img    = get_the_post_thumbnail_url( $read );
		$object = $object['url'];
	} else {
		$img    = get_the_post_thumbnail_url( $read, $size );
		$object = $object['sizes'][ $size ];
	}
	if ( $img ) {
		$url = $img;
	} else {
		$url = $object;
	}
	?>
<figure class="el_acf_img<?php echo esc_attr( $cls ); ?>">
	<img src="<?php echo esc_url( $url ); ?>" alt="サムネイル">
</figure>
	<?php
}

/**
 * ------ サムネイル画像（URL） -------
 *
 * @param str $size 画像サイズ.
 * @param str $read 投稿ID（空欄で現在の投稿）.
 */
function img_output_thumb_url( $size = 'url', $read = '' ) {
	$object = get_field( 'ad_noImage', 'option' );
	if ( 'url' === $size ) {
		$img    = get_the_post_thumbnail_url( $read );
		$object = $object['url'];
	} else {
		$img    = get_the_post_thumbnail_url( $read, $size );
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
 * @param str $title 画像フィールド名.
 * @param str $size comment.
 * @param str $cls 固有クラス名の指定.
 * @param str $option comment.
 */
function img_output( $title, $size = 'url', $cls = '', $option = 'option' ) {
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
<figure class="el_acf_img<?php echo esc_attr( $cls ); ?>">
	<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
</figure>
	<?php
}

/**
 * ------ ACF画像フィールド（URL） -------
 *
 * @param str $title 画像フィールド名.
 * @param str $size 画像サイズ.
 * @param str $option optionページ指定.
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
 * @param str $title 画像フィールド名.
 * @param str $size 画像サイズ.
 * @param str $cls 固有クラス名の指定.
 */
function img_output_sub( $title, $size = 'url', $cls = '' ) {
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
 * @param str $title 画像フィールド名.
 * @param str $size 画像サイズ.
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
 * @param str $title 画像フィールド名.
 * @param str $size 画像サイズ.
 * @param str $option optionページ指定.
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
 * @param str $tmp カラム制御用フィールド名.
 */
function ly_cont__col( $tmp = 'dv_page' ) {
	if ( get_field( $tmp, 'option' ) ) {
		echo ' ly_cont__col';
	}
}

/**
 * ------ カラム制御と連動してサイドバーを出力 -------
 *
 * @param str $tmp カラム制御用フィールド名.
 * @param str $name ファイル名.
 */
function set_sidebar( $tmp = 'dv_page', $name = '' ) {
	if ( get_field( $tmp, 'option' ) ) {
		get_sidebar( $name );
	}
}
