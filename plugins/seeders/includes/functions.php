<?php

function delete_all_posts_by_type($post_type) 
{
    $posts = get_posts([
        'post_type'      => $post_type,
        'posts_per_page' => -1,
        'post_status'    => 'any',
    ]);

    foreach ($posts as $post) {
        wp_delete_post($post->ID, true);
    }
}