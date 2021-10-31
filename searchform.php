<?php
/**
 *  File Name: 検索フォーム
 *
 * @package WordPress
 */

/*
--------------------------------
 *	変数定義
--------------------------------
*/
?>

<form method="get" class="el_searchBox" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" placeholder="Search…" name="s" class="el_searchBox_field" value="" />
	<input type="submit" value="&#xf002;" alt="検索" title="検索" class="el_searchBox_submit">
</form>
