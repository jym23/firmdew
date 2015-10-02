<?php
	
function post_type_sliders() {

	$labels = array(
		'name'               => _x( 'Sliders', 'post type general name' ),
		'singular_name'      => _x( 'Slider', 'post type singular name' ),
		'add_new'            => _x( '(+) Slider', 'series_box' ),
		'add_new_item'       => __( 'New Slider' ),//title
		'edit_item'          => __( 'Edit Slider' ),
		'new_item'           => __( 'New Slider' ),
		'all_items'          => __( 'List of Sliders' ),
		'view_item'          => __( 'View Slider' ),
		'search_items'       => __( 'Search Sliders' ),
		'not_found'          => __( 'No Sliders' ),
		'not_found_in_trash' => __( 'No Sliders in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Slider'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Website Sliders',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);

	register_post_type( 'sliders', $args ); 
	
}

add_action( 'init', 'post_type_sliders' );

?>