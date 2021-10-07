<?php
/**
 * FileName: 新規ウィジェット生成
 *
 * @package WordPress
 */

/**
 * ------ 関連記事ウィジェット -------
 */
class RelatedPost extends WP_Widget {
	/** Comment. */
	public function RelatedPost() {
		parent::WP_Widget(
			false,
			$name = '関連記事',
			array( 'description' => '投稿の共通タグをもつ記事を取得して表示' )
		);
	}
	/**
	 * Comment.
	 *
	 * @param str $instance Comment.
	 */
	public function form( $instance ) {
		?>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ); ?></label>
	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
</p>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"><?php esc_html_e( '表示する投稿数:' ); ?></label>
	<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>" value="<?php echo esc_attr( $instance['limit'] ); ?>" size="3">
</p>
		<?php
	}

	/**
	 * Comment
	 *
	 * @param str $new_instance comment.
	 * @param str $old_instance comment.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = wp_strip_all_tags( $new_instance['title'] );
		$instance['limit'] = is_numeric( $new_instance['limit'] ) ? $new_instance['limit'] : 6;
		return $instance;
	}

	/**
	 * Comment
	 *
	 * @param str $mains comment.
	 * @param str $instance comment.
	 */
	public function widget( $mains, $instance ) {
		if ( '' !== $instance['title'] ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
		}
		echo wp_kses_post( $mains['before_widget'] );
		if ( $title ) {
			echo wp_kses_post( $mains['before_title'] . $title . $mains['after_title'] );
		}
		$args = array(
			'num'      => $instance['limit'],
			'current'  => 'on',
			'type'     => 'any',
			'card'     => 'relation',
			'taxonomy' => 'relation',
			'orderby'  => 'rand',
		);

		get_template_part( 'template-parts/sub/sub', '', $args ); // サブループ.
		echo wp_kses_post( $mains['after_widget'] );
	}
}

register_widget( 'RelatedPost' );
