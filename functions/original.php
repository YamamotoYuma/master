<?php
/**
 * ユーザー定義関数
 *
 * @package WordPress
 */

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
 * @param str $name 出力するファイルの名前.
 */
function set_sidebar( $tmp = 'dv_page', $name = '' ) {
	if ( get_field( $tmp, 'option' ) ) {
		get_sidebar( $name );
	}
}

/*
--------------------------------
 *  画像出力
--------------------------------
*/

/**
 * ------ サムネイル画像（figure > img） -------
 *
 * @param str $size 画像サイズ ※省略化（オリジナルサイズ）.
 * @param str $read 投稿ID ※省略化（現在の投稿）.
 * @param str $cls 固有クラス名の指定 ※省略化（.el_acf_img）.
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
 * @param str $size 画像サイズ ※省略化（オリジナルサイズ）.
 * @param str $read 投稿ID ※省略化（現在の投稿）.
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
 * @param str $size 画像サイズ ※省略化（オリジナルサイズ）.
 * @param str $cls 固有クラス名の指定 ※省略化（.el_acf_img）.
 * @param str $option オプションページ是非（オプションページ）.
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
 * @param str $size 画像サイズ ※省略化（オリジナルサイズ）.
 * @param str $option オプションページ是非（オプションページ）.
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
 * @param str $size 画像サイズ ※省略化（オリジナルサイズ）.
 * @param str $cls 固有クラス名の指定 ※省略化（.el_acf_img）.
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
<figure class="el_acf_img<?php echo esc_attr( $cls ); ?>">
	<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
</figure>
	<?php
}

/**
 * ------ ACF画像サブフィールド（URL） -------
 *
 * @param str $title 画像フィールド名.
 * @param str $size 画像サイズ ※省略化（オリジナルサイズ）.
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
 * @param str $size 画像サイズ ※省略化（オリジナルサイズ）.
 * @param str $option オプションページ是非（オプションページ）.
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
<figure class="el_acf_img<?php echo esc_attr( $cls ); ?>">
	<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
</figure>
	<?php
}
