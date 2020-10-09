<?php

class AdsterCustomAds {
    public function run(){
        add_action('init',array($this, 'adster_custom_post_types'));
        add_action('init',array($this, 'adster_register_ads_meta'));
    } 

    public function adster_register_ads_meta(){
		Global $post;
		register_post_meta( 'adster_custom_ad', 'adster_template', [
			'single' => true,
			'show_in_rest' => true,
			'sanitize_callback' => function( $value ) {
				return wp_strip_all_tags( $value );
			},
			'type' =>'string'
        ] );
        
        register_post_meta( 'adster_custom_ad', 'adster_bg_color', [
			'single' => true,
			'show_in_rest' => true,
			'sanitize_callback' => function( $value ) {
				return wp_strip_all_tags( $value );
			},
			'type' =>'string'
		] );

		register_post_meta( 'adster_custom_ad', 'adster_shortcode', [
			'single' => true,
			'show_in_rest' => true,
			'sanitize_callback' => function( $value ) {
				return wp_strip_all_tags( $value );
			},
			'type' =>'string'
		] );

		register_post_meta( 'adster_custom_ad', 'adster_preview', [
			'single' => true,
			'show_in_rest' => true,
			'sanitize_callback' => function( $value ) {
				return wp_strip_all_tags( $value );
			},
			'type' =>'string'
		] );

		register_post_meta( 'adster_custom_ad', 'adster_countdown', [
			'single' => true,
			'show_in_rest' => true,
			'sanitize_callback' => function( $value ) {
				return wp_strip_all_tags( $value );
			},
			'type' =>'string'
		] );
	}

    public function adster_custom_post_types(){
		register_post_type(
			'adster_custom_ad',
				array(
					'labels'              => array(
						'name'                  => __( 'Ads'),
						'singular_name'         => __( 'Ad'),
						'menu_name'             => __( 'Ads', 'Admin menu name'),
						'add_new'               => __( 'Add ad'),
						'add_new_item'          => __( 'Add new ad'),
						'edit'                  => __( 'Edit'),
						'edit_item'             => __( 'Edit ad'),
						'new_item'              => __( 'New ad'),
						'view_item'             => __( 'View ad'),
						'search_items'          => __( 'Search ads'),
						'not_found'             => __( 'No ads found'),
						'not_found_in_trash'    => __( 'No ads found in trash'),
						'parent'                => __( 'Parent ad'),
						'filter_items_list'     => __( 'Filter ads'),
						'items_list_navigation' => __( 'Ads navigation'),
						'items_list'            => __( 'Ads list'),
					),
					'description'         => __( 'This is where you can add new custom_ads that you can them display anywhere withim a post.'),
					'public'              => false,
					'show_ui'             => true,
					'publicly_queryable'  => false,
					'rewrite'             => false,
					'query_var'           => false,
					'supports'            => array('title', 'id'),
					'show_in_nav_menus'   => false,
					'show_in_admin_bar'   => true,
					'menu_icon' => 'dashicons-book',
				)
		);
	}
}