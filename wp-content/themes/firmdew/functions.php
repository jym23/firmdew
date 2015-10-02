<?php

include( get_template_directory() . '/libraries/theme-setup.php');
include( get_template_directory() . '/libraries/custom-post-types.php');

function post_featured_img( $post_id = null ){

	return $img_src = wp_get_attachment_url( get_post_thumbnail_id( $post_id ) );

}
?>