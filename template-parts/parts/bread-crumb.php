<?php
/**
 * パンくずリスト
 *
 * @package underscore
 */

// トップページでは何も出力しないように.
if ( is_front_page() ) {
	return false;
}

// そのページのWPオブジェクトを取得.
$wp_obj = get_queried_object(); ?>

<div class="bl_breadcrumb">
	<ul>
		<li><a href="<?php echo esc_url( home_url() ); ?>"><span>ホーム</span></a></li>

		<?php if ( is_attachment() ) : // A：添付ファイルページ ( $wp_obj : WP_Post )※ 添付ファイルページでは is_single() も true になるので先に分岐. ?>

			<?php
			$single_title      = apply_filters( 'the_title', $wp_obj->post_title );
			$single_title      = apply_filters( 'the_title', $wp_obj->post_title );
			$single_title_trim = wp_trim_words( $single_title, 14, '...' );
			?>
			<li><span class="bl_breadcrumb_sep">></span><span><?php echo esc_url( $single_title_trim ); ?></span></li>

		<?php elseif ( is_single() ) : // A：投稿ページ ( $wp_obj : WP_Post ). ?>
			<?php
			$single_id         = $wp_obj->ID;
			$single_type       = $wp_obj->post_type;
			$single_title      = apply_filters( 'the_title', $wp_obj->post_title );
			$single_title_trim = wp_trim_words( $single_title, 14, '...' );
			?>

			<?php if ( 'post' !== $single_type ) : // B：カスタム投稿タイプである場合. ?>

				<?php
				$the_tax   = ''; // 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く).
				$tax_array = get_object_taxonomies( $single_type, 'names' );
				foreach ( $tax_array as $tax_name ) {
					if ( 'post_format' !== $tax_name ) {
						$the_tax = $tax_name;
						break;
					}
				}
				$single_type_link  = get_post_type_archive_link( $single_type );
				$single_type_label = get_post_type_object( $single_type )->label;
				?>

				<li><span class="bl_breadcrumb_sep">></span><a href="<?php echo esc_url( $single_type_link ); ?>"><span><?php echo esc_html( $single_type_label ); ?></span></a></li>

			<?php else : // B：カスタム投稿タイプではない場合（デフォルト投稿の場合）. ?>

				<?php $the_tax = 'category'; // カテゴリーを表示. ?>

			<?php endif; // B. ?>

			<?php $terms = get_the_terms( $single_id, $the_tax ); // 投稿に紐づくタームを全て取得. ?>

			<?php if ( false !== $terms ) : // C：タクソノミーが紐づいていれば表示. ?>

				<?php
				$child_terms  = array();  // 子を持たないタームだけを集める配列.
				$parents_list = array();  // 子を持つタームだけを集める配列.

				// 全タームの親IDを取得.
				foreach ( $terms as $value ) {
					if ( 0 !== $value->parent ) {
						$parents_list[] = $value->parent;
					}
				}

				// 親リストに含まれないタームのみ取得.
				foreach ( $terms as $value ) {
					if ( ! in_array( $value->term_id, $parents_list, true ) ) {
						$child_terms[] = $value;
					}
				}
				$value = $child_terms[0]; // 最下層のターム配列から一つだけ取得.
				?>

				<?php if ( 0 !== $value->parent ) : // D. ?>

					<?php $parent_array = array_reverse( get_ancestors( $value->term_id, $the_tax ) ); ?>

					<?php foreach ( $parent_array as $parent_id ) : // E：親タームのIDリストを取得. ?>
						<?php
						$parent_term = get_term( $parent_id, $the_tax );
						$parent_link = get_term_link( $parent_id, $the_tax );
						$parent_name = $parent_term->name;
						?>
						<li><span class="bl_breadcrumb_sep">></span><a href="<?php echo esc_url( $parent_link ); ?>"><span><?php echo esc_html( $parent_name ); ?></span></a></li>
					<?php endforeach; // E. ?>
				<?php endif; // D. ?>
					<?php
					$value_link = get_term_link( $value->term_id, $the_tax );
					$value_name = $value->name; // 最下層のタームを表示.
					?>
					<li><span class="bl_breadcrumb_sep">></span><a href="<?php echo esc_url( $value_link ); ?>"><span><?php echo esc_html( $value_name ); ?></span></a></li>
			<?php endif;  // C. ?>

			<li><span class="bl_breadcrumb_sep">></span><span><?php echo esc_html( wp_strip_all_tags( $single_title_trim ) ); // 投稿の表示. ?></span></li>

		<?php elseif ( is_page() || is_home() ) : // A：固定ページ ( $wp_obj : WP_Post ). ?>
			<?php
			$page_id    = $wp_obj->ID;
			$page_title = apply_filters( 'the_title', $wp_obj->post_title );
			?>

			<?php if ( 0 !== $wp_obj->post_parent ) : // F：親ページがあれば順番に表示. ?>
				<?php
				$parent_array = array_reverse( get_post_ancestors( $page_id ) );
				?>
				<?php foreach ( $parent_array as $parent_id ) : // G. ?>
					<?php
					$parent_link = get_permalink( $parent_id );
					$parent_name = get_the_title( $parent_id );
					?>
					<li><span class="bl_breadcrumb_sep">></span><a href="<?php echo esc_url( $parent_link ); ?>"><span><?php echo esc_html( $parent_name ); ?></span></a></li>
				<?php endforeach; // G. ?>
			<?php endif; // F. ?>

			<li><span class="bl_breadcrumb_sep">></span><span><?php echo esc_html( wp_strip_all_tags( $page_title ) ); // 投稿の表示. ?></span></li>

		<?php elseif ( is_post_type_archive() ) : // A：投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type ). ?>

			<li><span class="bl_breadcrumb_sep">></span><span><?php echo esc_html( $wp_obj->label ); // 投稿の表示. ?></span></li>

		<?php elseif ( is_date() ) : // A：日付アーカイブページ ( $wp_obj : null ). ?>
			<?php
			$yearnum = get_query_var( 'year' );
			$month   = get_query_var( 'monthnum' );
			$day     = get_query_var( 'day' );
			?>
			<?php if ( 0 !== $day ) : // H：日別アーカイブ. ?>

				<li><span class="bl_breadcrumb_sep">></span><a href="<?php echo esc_url( get_year_link( $yearnum ) ); ?>"><span><?php echo esc_html( $yearnum ); ?>年</span></a></li>
				<li><span class="bl_breadcrumb_sep">></span><a href="<?php echo esc_url( get_month_link( $yearnum, $month ) ); ?>"><span><?php echo esc_html( $month ); ?>月</span></a></li>
				<li><span class="bl_breadcrumb_sep">></span><span><?php echo esc_html( $day ); ?>日</span></li>

			<?php elseif ( 0 !== $month ) : // H：月別アーカイブ. ?>

				<li><span class="bl_breadcrumb_sep">></span><a href="<?php echo esc_url( get_year_link( $yearnum ) ); ?>"><span><?php echo esc_html( $yearnum ); ?>年</span></a></li>
				<li><span class="bl_breadcrumb_sep">></span><span><?php echo esc_html( $month ); ?>月</span></li>

			<?php else : // H：年別アーカイブ. ?>

				<li><span class="bl_breadcrumb_sep">></span><span><?php echo esc_html( $yearnum ); ?>年</span></li>

			<?php endif; // H. ?>

		<?php elseif ( is_author() ) : // A：投稿者アーカイブ ( $wp_obj : WP_User ). ?>

			<li><span class="bl_breadcrumb_sep">></span><span><?php echo esc_html( $wp_obj->display_name ); ?>の執筆記事</span></li>

		<?php elseif ( is_archive() ) : // A：タームアーカイブ( $wp_obj : WP_Term ). ?>

			<?php
			/* ここでタクソノミーに紐づくカスタム投稿タイプを出力 */
			$value_id   = $wp_obj->term_id;
			$value_name = $wp_obj->name;
			$tax_name   = $wp_obj->taxonomy;
			?>

			<?php if ( 0 !== $wp_obj->parent ) : // I：親ページがあれば順番に表示. ?>

				<?php
				$parent_array = array_reverse( get_ancestors( $value_id, $tax_name ) );
				?>
				<?php foreach ( $parent_array as $parent_id ) : // O. ?>
					<?php
					$parent_term = get_term( $parent_id, $tax_name );
					$parent_link = get_term_link( $parent_id, $tax_name );
					$parent_name = $parent_term->name;
					?>
					<li><span class="bl_breadcrumb_sep">></span><a href="<?php echo esc_url( $parent_link ); ?>"><span><?php echo esc_html( $parent_name ); ?></span></a></li>
				<?php endforeach; // O. ?>

			<?php endif; // I. ?>

				<li><span class="bl_breadcrumb_sep">></span><span><?php echo esc_html( $value_name ); // タームの表示. ?></span></li>

		<?php elseif ( is_search() ) : // A：検索結果ページ. ?>

			<li><span class="bl_breadcrumb_sep">></span><span>「<?php echo esc_html( get_search_query() ); ?>」で検索した結果</span></li>

		<?php elseif ( is_404() ) : // A：404ページ. ?>

			<li><span class="bl_breadcrumb_sep">></span><span>お探しの記事は見つかりませんでした。</span></li>

		<?php else : // A：その他のページ. ?>

			<li><span class="bl_breadcrumb_sep">></span><span><?php echo esc_html( get_the_title() ); ?></span></li>

		<?php endif; // A. ?>

	</ul>
</div>
<!-- /.bl_breadcrumb -->
