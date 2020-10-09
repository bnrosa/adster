<?php

class AdsterTaxonomies {

    public function run(){
		add_action( 'init' , array($this, 'adster_register_taxonomies') );
    }
    
	public function adster_register_taxonomies(){
		register_taxonomy('type', 'adster_custom_ad', array(
			'label' => 'Types',
			'rewrite' => false,
			'hierarchical' => false,
			'public' => false,
            'show_in_menu' => true,
            'show_ui' => true,
            'show_in_rest' => true,
		) );
	}
}