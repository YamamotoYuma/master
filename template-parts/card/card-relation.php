<li class="bl_vertPosts_item">
    <div class="bl_vertPosts_headr">
        <time class="ble_vertPosts_date" datetime="<?php echo get_the_date('Y-m-d');?>"><?php echo get_the_date('Y/m/d');?></time>
    </div>
    <!--/.bl_vertPosts_headr-->
    <a href="<?php the_permalink();?>" class="bl_vertPosts_ttl"><?php echo wp_trim_words( get_the_title(), 40, '...' ); //タイトル?></a>
</li>