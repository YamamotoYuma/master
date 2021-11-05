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
 * @param int $read 投稿ID ※省略化（現在の投稿）.
 * @param str $cls 固有クラス名の指定 ※省略化（.el_acf_img）.
 * @param str $ani comment.
 */
function img_output_thumb( $size = 'url', $read = '', $cls = '', $ani = '' ) {
	if ( $ani ) {
		$ani = ' js_scrollIn ' . $ani; // アニメーション用追加クラス.
	}
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
<figure class="el_acf_img<?php echo esc_attr( $cls ); ?><?php echo esc_attr( $ani ); ?>">
	<img src="<?php echo esc_url( $url ); ?>" alt="サムネイル">
</figure>
	<?php
}

/**
 * ------ サムネイル画像（URL） -------
 *
 * @param str $size 画像サイズ ※省略化（オリジナルサイズ）.
 * @param int $read 投稿ID ※省略化（現在の投稿）.
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
 * @param str $option オプションページ是非（option）.
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

/*
--------------------------------
 *  埋め込み出力
--------------------------------
*/

/**
 * ------ Googleマップ -------
 */
function googlemap() {
	?>
	<div class="bl_map">
		<iframe src="<?php the_field( 'ad_googleMap', 'option' ); ?>" width="100%" height="100%" style="border:0;" aria-hidden="false" tabindex="0" allowfullscreen="" loading="lazy"></iframe>
	</div>
	<!-- /bl_map. -->
	<?php
}

/**
 * ------ QRコード出力 -------
 *
 * @param str $title URLフィールド名.
 * @param str $size 縦横サイズpx（160）.
 * @param str $option オプションページ是非（option）.
 */
function get_qrcode( $title, $size = '150', $option = 'option' ) {
	?>
	<?php $the_size; ?>
	<figure class="el_qrcode">
		<img src="https://chart.googleapis.com/chart?chs=<?php echo esc_attr( $size ); ?>x<?php echo esc_attr( $size ); ?>&cht=qr&chl=<?php the_field( $title, $option ); ?>&choe=UTF-8 " alt="QR Code"/>
	</figure>
	<?php
}

/*
--------------------------------
 *  フィールドグループ：基本モジュール出力
 *  ※クローンフィールドによる再利用を想定
--------------------------------
*/

/**
 * ------ H2見出し（ルビ付き） -------
 *
 * @param str $title クローンフィールド名（Prefix）.
 * @param str $cls クラス指定（el_lv2Heading）.
 * @param str $option オプションページ是非（option）.
 */
function h2_rubi( $title, $cls = 'el_lv2Heading', $option = 'option' ) {
	$field       = $title . '_h2r'; // クローンフィールド名と基本モジュールフィールド名を結合.
	$group_field = get_field( $field, $option ); // フィールドオブジェクトを変数に格納.
	?>
	<h2 class="<?php echo esc_attr( $cls ); ?>" data-rubi="<?php echo esc_attr( $group_field['rubi'] ); // ルビ. ?>">
		<?php echo esc_html( $group_field['h2'] ); // 見出し. ?>
	</h2>
	<?php
}

/**
 * ------ ボタン -------
 *
 * @param str $title クローンフィールド名（Prefix）.
 * @param str $option オプションページ是非（option）.
 */
function btn( $title, $option = 'option' ) {
	$field       = $title . '_btn'; // クローンフィールド名と基本モジュールフィールド名を結合.
	$group_field = get_field( $field, $option ); // フィールドオブジェクトを変数に格納.
	$class       = 'el_btn__' . $title; // 専用のモディファイアクラスを生成.
	?>
	<a class="el_btn <?php echo esc_attr( $cls ); ?>" href="<?php echo esc_url( $group_field['link'] ); ?>">
		<?php echo esc_html( $group_field['ttl'] ); // タイトル. ?>
	</a>
	<!-- /.el_btn -->
	<?php
}

/**
 * ------ ギャラリーユニット -------
 *
 * @param str $title クローンフィールド名（Prefix）.
 * @param str $size 画像サイズ ※省略化（オリジナルサイズ）.
 * @param str $option オプションページ是非（option）.
 */
function gallery_unit( $title, $size = 'url', $option = 'option' ) {
	$field   = $title . '_gallery'; // クローンフィールド名と基本モジュールフィールド名を結合.
	$objects = get_field( $field, $option ); // フィールドオブジェクトを変数に格納.
	$class   = 'bl_gallery__' . $title; // 専用のモディファイアクラスを生成.
	if ( $objects ) : // A.
		?>
		<ul class="bl_galleryUnit <?php echo esc_attr( $class ); ?>Unit clearListStyle">
			<?php foreach ( $objects as $object ) : // B. ?>
				<?php
				if ( 'url' === $size ) {
					$url = $object['url']; // デフォルトサイズの画像URLを取得（指定がなければ）.
				} else {
					$url = $object['sizes'][ $size ]; // 指定サイズの画像URLを取得（指定があれば）.
				}
				$alt = $object['alt']; // 代替テキストの取得.
				?>
				<li class="bl_gallery <?php echo esc_attr( $class ); ?>">
					<figure class="bl_gallery_imgWrapper <?php echo esc_attr( $class ); ?>_imgWrapper">
						<a class="bl_gallery_layer <?php echo esc_attr( $class ); ?>_layer" href="<?php echo esc_url( $object['url'] ); ?>"></a>
						<img class="bl_gallery_img <?php echo esc_attr( $class ); ?>_img" src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
					</figure>
					<?php if ( $object['caption'] ) : // C キャプションの入力があれば表示. ?>
						<small class="bl_gallery_caption <?php echo esc_attr( $class ); ?>_caption">
							<?php echo esc_html( $object['caption'] ); ?>
						</small>
					<?php endif; // C. ?>
				</li>
			<?php endforeach; // B. ?>
		</ul>
	<?php endif; // A. ?>
	<?php
}

/**
 * ------ YouTube動画ID -------
 *
 * @param str $title クローンフィールド名（Prefix）.
 * @param str $option オプションページ是非（option）.
 */
function youtube( $title, $option = 'option' ) {
	$field = $title . '_youtube'; // クローンフィールド名と基本モジュールフィールド名を結合.
	$yid   = get_field( $field, $option ); // フィールドの値を変数に格納.
	$class = 'el_video__' . $title; // 専用のモディファイアクラスを生成.
	?>
	<div class="el_video <?php echo esc_attr( $class ); ?>" style="position: relative; padding-bottom: 56.25%;">
		<iframe 
				style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" 
				src="https://www.youtube.com/embed/<?php echo esc_attr( $yid ); ?>?mute=1" 
				frameborder="0" 
				allow="autoplay; encrypted-media" 
				allowfullscreen>
		</iframe>
	</div>
	<?php
}

/**
 * ------ リストユニット -------
 *
 * @param str $title クローンフィールド名（Prefix）.
 * @param str $option オプションページ是非（option）.
 */
function list_unit( $title, $option = 'option' ) {
	$field = $title . '_ul'; // クローンフィールド名と基本モジュールフィールド名を結合.
	$class = 'bl_list__' . $title; // 専用のモディファイアクラスを生成.
	if ( have_rows( $field, $option ) ) : // A.
		?>
		<ul class="bl_list <?php echo esc_attr( $class ); ?>">
			<?php while ( have_rows( $field, $option ) ) : // B. ?>
				<?php the_row(); ?>
				<li class="bl_list_li <?php echo esc_attr( $class ); ?>_li"><?php the_sub_field( 'li' ); ?></li>
			<?php endwhile; // B. ?>
		</ul>
	<?php endif; // A. ?>
	<?php
}

/**
 * ------ テーブルユニット -------
 *
 * @param str $title クローンフィールド名（Prefix）.
 * @param str $option オプションページ是非（option）.
 */
function table_unit( $title, $option = 'option' ) {
	$field = $title . '_table'; // クローンフィールド名と基本モジュールフィールド名を結合.
	$class = 'bl_table__' . $title; // 専用のモディファイアクラスを生成.
	if ( have_rows( $field, $option ) ) : // A.
		?>
		<table class="bl_table <?php echo esc_attr( $class ); ?>">
			<tbody>
				<?php while ( have_rows( $field, $option ) ) : // B. ?>
					<?php the_row(); ?>
					<tr>
						<th class="bl_table_th <?php echo esc_attr( $class ); ?>_th"><?php the_sub_field( 'th' ); ?></th>
						<td class="bl_table_td <?php echo esc_attr( $class ); ?>_td"><?php the_sub_field( 'td' ); ?></td>
					</tr>
				<?php endwhile; // B. ?>
			</tbody>
		</table>
	<?php endif; // A. ?>
	<?php
}

/**
 * ------ 2セットユニット -------
 *
 * @param str $title クローンフィールド名（Prefix）.
 * @param str $option オプションページ是非（option）.
 */
function set2_unit( $title, $option = 'option' ) {
	$field = $title . '_2set'; // クローンフィールド名と基本モジュールフィールド名を結合.
	$class = 'bl_2set__' . $title; // 専用のモディファイアクラスを生成.
	if ( have_rows( $field, $option ) ) : // A.
		?>
		<div class="bl_2setUnit <?php echo esc_attr( $class ); ?>Unit">
			<?php while ( have_rows( $field, $option ) ) : // B. ?>
				<?php the_row(); ?>
				<div class="bl_2set <?php echo esc_attr( $class ); ?>">
					<h4 class="bl_2set_ttl <?php echo esc_attr( $class ); ?>_ttl"><?php the_sub_field( 'ttl' ); ?></h4>
					<p class="bl_3set_desc <?php echo esc_attr( $class ); ?>_desc"><?php the_sub_field( 'txt' ); ?></p>
				</div>
				<!-- /.bl_2set -->
			<?php endwhile; // B. ?>
		</div>
		<!-- /.bl_2setUnit -->
	<?php endif; // A. ?>
	<?php
}

/**
 * ------ 3セットユニット -------
 *
 * @param str $title クローンフィールド名（Prefix）.
 * @param str $option オプションページ是非（option）.
 */
function set3_unit( $title, $option = 'option' ) {
	$field = $title . '_3set'; // クローンフィールド名と基本モジュールフィールド名を結合.
	$class = 'bl_3set__' . $title; // 専用のモディファイアクラスを生成.
	if ( have_rows( $field, $option ) ) : // A.
		?>
		<div class="bl_3setUnit <?php echo esc_attr( $class ); ?>Unit">
			<?php while ( have_rows( $field, $option ) ) : // B. ?>
				<?php the_row(); ?>
				<div class="bl_3set <?php echo esc_attr( $class ); ?>">
					<div class="bl_3set_inner <?php echo esc_attr( $class ); ?>_inner left">
						<?php img_output_sub( 'img', 'large' ); ?>
					</div>
					<!-- /.bl_3set_inner left-->
					<div class="bl_3set_inner <?php echo esc_attr( $class ); ?>_inner right">
						<?php $group_field = get_sub_field( 'con' ); ?>
						<h4 class="bl_3set_ttl <?php echo esc_attr( $class ); ?>_ttl"><?php echo wp_kses_post( $group_field['ttl'] ); ?></h4>
						<p class="bl_3set_desc <?php echo esc_attr( $class ); ?>_desc"><?php echo wp_kses_post( $group_field['txt'] ); ?></p>
					</div>
					<!-- /.bl_3set_inner right-->
				</div>
				<!-- /.bl_3set -->
			<?php endwhile; // B. ?>
		</div>
		<!-- /.bl_3setUnit -->
	<?php endif; // A. ?>
	<?php
}

/**
 * ------ カードユニット -------
 *
 * @param str $title クローンフィールド名（Prefix）.
 * @param str $option オプションページ是非（option）.
 */
function cards_unit( $title, $option = 'option' ) {
	$field = $title . '_cards'; // クローンフィールド名と基本モジュールフィールド名を結合.
	$class = 'bl_cards__' . $title; // 専用のモディファイアクラスを生成.
	if ( have_rows( $field, $option ) ) : // A.
		?>
		<ul class="bl_cardsUnit <?php echo esc_attr( $class ); ?>Unit clearListStyle">
			<?php while ( have_rows( $field, $option ) ) : // B. ?>
				<?php the_row(); ?>
				<li class="bl_cards <?php echo esc_attr( $class ); ?>">
					<?php img_output_sub( 'img', 'large' ); ?>
					<h6 class="bl_cards_ttl <?php echo esc_attr( $class ); ?>_ttl"><?php the_sub_field( 'ttl' ); ?></h6>
				</li>
				<!-- /.bl_cards -->
			<?php endwhile; // B. ?>
		</ul>
		<!-- /.bl_cardsUnit -->
	<?php endif; // A. ?>
	<?php
}

/*
--------------------------------
 *  その他
--------------------------------
*/
/**
 * ------ ページタイトル -------
 *
 * @param str $slug ページスラッグ.
 */
function page_ttl( $slug ) {
	$page_id = get_post( get_the_ID() );
	if ( get_field( 'page_en', $page_id ) ) {
		$en = get_field( 'page_en', $page_id );
	} else {
		$en = $page_id->post_name;
	}
	?>
	<header class="ly_sect ly_sect__pageHerder ly_sect__pageHerder_<?php echo esc_attr( $slug ); ?>">
		<div class="ly_sect__pageHerder_inner">
			<h1 class="entry-title el_lv1Heading" data-rubi="<?php echo esc_attr( $en ); ?>"><?php the_title(); ?></h1>
		</div>
		<!-- /.ly_sect__pageHerder_inner -->
	</header>
	<?php
}

/**
 * ------ アーカイブタイトル -------
 *
 * @param str $type 投稿タイプスラッグ.
 */
function archive_ttl( $type ) {
	?>
	<header class="ly_sect ly_sect__archiveHerder ly_sect__archiveHerder_<?php echo esc_attr( $type ); ?>">
		<div class="ly_sect__archiveHerder_inner">
			<h1 class="entry-title el_lv1Heading" data-rubi="<?php echo esc_attr( $type ); ?>"><?php the_archive_title(); ?></h1>
		</div>
		<!-- /.ly_sect__pageHerder_inner -->
	</header>
	<?php
}