<?php
/**
 * 「カスタム投稿タイプの追加、カスタムタクソノミーの追加、その他投稿制御」
 * カスタム投稿タイプの追加はこちらに記述してください
 *
 * @package WordPress
 */

?>
<?php
/**
 * カスタム投稿タイプの定義
 */
function my_custom_init() {
	/*
	--------------------------------
	* 投稿タイプ：お知らせ
	--------------------------------
	*/
	register_post_type(
		'news',
		array(
			'label'         => 'お知らせ',
			'public'        => true,
			'supports'      => array( 'title', 'editor', 'author', 'thumbnail' ),
			'menu_position' => 4,
			'has_archive'   => true,
			'show_in_rest'  => true,
			'menu_icon'     => 'dashicons-admin-post',
		)
	);
	/*------ タクソノミー：お知らせカテゴリー -------*/
	register_taxonomy(
		'newscat', // タクソノミースラッグ.
		'news', // 投稿タイプ.
		array(
			'hierarchical'          => true,
			'update_count_callback' => '_update_post_term_count',
			'label'                 => 'お知らせカテゴリー',
			'public'                => true,
			'show_in_rest'          => true,
			'show_ui'               => true,
		)
	);

	/*
	--------------------------------
	* 共通タクソノミー：関連タグ
	--------------------------------
	*/
	register_taxonomy(
		'relation', // タクソノミースラッグ.
		array( // 使用カスタム投稿スラッグ.
			'post',
			'news',
			'product',
		),
		array(
			'hierarchical'          => false,
			'update_count_callback' => '_update_post_term_count',
			'label'                 => '関連タグ',
			'public'                => true,
			'show_in_rest'          => true,
			'show_ui'               => true,
		)
	);

}add_action( 'init', 'my_custom_init' );

/**
 * [投稿]からデフォルト[タグ]タクソノミーを削除
 */
function my_unregister_taxonomies() {
	global $wp_taxonomies;

	if ( ! empty( $wp_taxonomies['post_tag']->object_type ) ) {
		foreach ( $wp_taxonomies['post_tag']->object_type as $i => $object_type ) {
			if ( 'post' === $object_type ) {
				unset( $wp_taxonomies['post_tag']->object_type[ $i ] );
			}
		}
	}

	return true;
}

add_action( 'init', 'my_unregister_taxonomies' );
