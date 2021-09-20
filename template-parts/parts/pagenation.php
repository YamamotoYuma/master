<?php
/**
 * ページネーション（メインループ）
 *
 * @package WordPress
 */

/*
--------------------------------
*  変数定義エリア
--------------------------------
*/
$pgs       = $additional_loop->max_num_pages;
$range     = 2;
$showitems = ( $range * 2 ) + 1;

global $paged; // ※グローバル宣言.
$pgd = $paged; // グローバル変数を$pgdに格納（グローバル変数のオーバーライドを回避）.
if ( empty( $pgd ) ) {
	$pgd = 1;
}

// ページ情報の取得.
if ( null === $pgs ) {
	global $wp_query; // ※グローバル宣言.
	$pgs = $wp_query->max_num_pages;
	if ( ! $pgs ) {
		$pgs = 1;
	}
}

$pgs = (int) $pgs; // float型（浮動小数点数）からinteger型（整数）へ変換.

/*
--------------------------------
*  DOM生成エリア
--------------------------------
*/
?>

<?php if ( 1 !== $pgs ) : // A. ?>
	<section class="ly_sect__archive ly_sect__archive_pagenation">
		<nav class="bl_pagenation">
			<ul class="bl_pagenation_inner" role="menubar" aria-label="Pagination">

				<?php if ( $pgd > 2 ) : // G 先頭ページへのリンク. ?>
					<li class="first">
						<a class="bl_pagenation_link" href="<?php echo esc_url( get_pagenum_link( 1 ) ); // 先頭へ. ?>"><i class="fas fa-angle-double-left"></i></a>
					</li>
				<?php endif; // G 先頭ページへのリンク. ?>

				<?php if ( $pgd > 1 ) : // F 1つ戻るページへのリンク. ?>
					<li class="previous">
						<a class="bl_pagenation_link" href="<?php echo esc_url( get_pagenum_link( $pgd - 1 ) ); // 1つ戻る. ?>"><i class="fas fa-angle-left"></i></a>
					</li>
				<?php endif; // F 1つ戻るページへのリンク. ?>

				<?php for ( $i = 1; $i <= $pgs; $i++ ) : // E 番号つきページ送りボタン. ?>
					<?php if ( 1 !== $pgs && ( ! ( $i >= $pgd + $range + 1 || $i <= $pgd - $range - 1 ) || $pgs <= $showitems ) ) : // B. ?>
						<?php if ( $pgd === $i ) : // C 現在のページ（リンクなし）. ?>
							<li>
								<span class="bl_pagenation_link is_active"><?php echo esc_html( $i ); ?></span>
							</li>
						<?php else : // C その他のページ（リンクあり）. ?>
							<li>
								<a class="bl_pagenation_link" href="<?php echo esc_url( get_pagenum_link( $i ) ); ?>" class="inactive" ><?php echo esc_html( $i ); ?></a>
							</li>
						<?php endif; // C. ?>
					<?php endif; // B. ?>
				<?php endfor; // E 番号つきページ送りボタン. ?>

				<?php if ( $pgd < $pgs ) : // H １つ進むページへのリンク. ?>
					<li class="next">
						<a class="bl_pagenation_link" href="<?php echo esc_url( get_pagenum_link( $pgd + 1 ) ); // 1つ進む. ?>"><i class="fas fa-angle-right"></i></a>
					</li>
				<?php endif; // H 1つ進むページへのリンク. ?>

				<?php if ( $pgd + 1 < $pgs ) : // I 最後尾ページへのリンク. ?>
					<li class="last">
						<a class="bl_pagenation_link" href="<?php echo esc_url( get_pagenum_link( $pgs ) ); // 最後尾へ. ?>"><i class="fas fa-angle-double-right"></i></a>
					</li>
				<?php endif; // I 最後尾ページへのリンク. ?>

			</ul>
		</nav>
	</section>
<?php endif; // A. ?>
