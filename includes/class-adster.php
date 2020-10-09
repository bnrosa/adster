<?php

class Adster {
	public function run() {
		$this->add_custom_ads();
		$this->add_metaboxes();
		$this->add_taxonomies();
		$this->add_shortcodes();
		add_action( 'wp_enqueue_scripts', array($this,'enqueue_assets') );
		add_action('admin_enqueue_scripts', array($this,'enqueue_assets') );
	}

	public function add_metaboxes() {
		require_once plugin_dir_path( __FILE__ ) . 'models/class-adster-metaboxes.php';
		$metaboxes_helper = new AdsterMetaboxes();
		$metaboxes_helper->run();
	}
	public function add_taxonomies() {
		require_once plugin_dir_path( __FILE__ ) . 'models/class-adster-taxonomies.php';
		$taxonomies_helper = new AdsterTaxonomies();
		$taxonomies_helper->run();
	}

	public function add_custom_ads() {
		require_once plugin_dir_path( __FILE__ ) . 'models/class-adster-custom-ads.php';
		$custom_ads_helper = new AdsterCustomAds();
		$custom_ads_helper->run();
	}

	public function add_shortcodes() {
		require_once plugin_dir_path( __FILE__ ) . 'class-adster-shortcodes.php';
		$shortcodes_helper = new AdsterShortcodes();
		$shortcodes_helper->run();
	}
	
	public function enqueue_assets() {
		wp_enqueue_style( 'adster-styles', plugin_dir_url( __FILE__ ) . '../assets/css/adster-styles.css');
		wp_enqueue_script( 'timer', plugin_dir_url( __FILE__ ) . '../assets/js/timer.js');
	}

	
}
