<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area ly_cont_side">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
