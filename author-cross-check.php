<?php

/*
Plugin Name: Author Cross Check
Plugin URI: https://github.com/thgiang/author-cross-check
Description: A Wordpress plugin makes it impossible for an Author to publish his own post. This makes publishing articles requiring at least 2 authors. Minimize the unfortunate mistakes caused by one individual.
Version: 1.0
Author: GiangTH
Author URI: https://github.com/thgiang
License: MIT
*/

function on_all_status_transitions( $new_status, $old_status, $post ) {
    //publish
    //private
    if (get_current_user_id() == $post->post_author && $new_status == 'publish') {
        wp_update_post( array( 'ID' => $post->ID, 'post_status' => 'private' ));
    }
}
add_action('transition_post_status',  'on_all_status_transitions', 10, 3 );