<?php
/**
 * 
 * ウィジェット、ナビゲーション関連
 * 
 */

/*--------------------------------
*	ナビメニューの追加
--------------------------------*/
function register_my_menu() {
    register_nav_menu( 'main-menu','Main Menu');
    register_nav_menu( 'sub-menu','Sub Menu');
}
add_action( 'after_setup_theme', 'register_my_menu' );

/*--------------------------------
*	ウィジェットエリア
--------------------------------*/
/*------ サイドバー -------*/
function underscores_widgets_init() {
register_sidebar(array(
    'name'          => esc_html__( 'Sidebar', 'underscores' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'underscores' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="el_sideBarTtl">',
    'after_title'   => '</h2>',
));
/*------ 投稿コンテンツ下部 -------*/
register_sidebar(array(
    'name'          => '投稿下部',
    'id'            => 'sidebar-2',
    'before_widget' => '<section id="%1$s" class="widgetUC %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="el_underContTtl">',
    'after_title'   => '</h2>',
));
}
add_action( 'widgets_init', 'underscores_widgets_init' );

/*--------------------------------
*	ウィジェット
--------------------------------*/
/*------ 関連記事 -------*/
class relatedPost extends WP_Widget {
    function relatedPost() {
        parent::WP_Widget(
			false,
			$name = '関連記事',
			array( 'description' => '投稿の共通タグをもつ記事を取得して表示', )
		);
    }
    
    function form( $instance ) {
    ?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
</p>
<p>
    <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('表示する投稿数:'); ?></label>
    <input type="text" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" value="<?php echo esc_attr( $instance['limit'] ); ?>" size="3">
</p>
<?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['limit'] = is_numeric($new_instance['limit']) ? $new_instance['limit'] : 6;
        return $instance;
    }

    function widget($args, $instance) {
        extract( $args );
        if($instance['title'] != ''){
            $title = apply_filters('widget_title', $instance['title']);
        }
        echo $before_widget;
        if( $title ){
            echo $before_title . $title . $after_title;
        }
        $args = [
            'num' => $instance['limit'],
            'current' => 'on',
            'taxonomy' => 'relation',
        ];
        get_template_part( 'template-parts/sub', 'relation', $args ); //サブループをインクルード
        echo $after_widget;
    }
}
register_widget('relatedPost');