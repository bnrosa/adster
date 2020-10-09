<?php

class AdsterShortcodes {
    public function run(){
        add_action('init', array($this, 'adster_shortcode'));
    }

    public function adster_shortcode(){
        add_shortcode('adster_custom_ad', array($this, 'get_adster_template'));
    }

    public function get_adster_template($args, $content){
        ob_start();
        $countdown = 0;
        if($args['id']){
            $countdown = get_post_meta($args['id'], 'adster_countdown', true );
        }
		include(plugin_dir_path( __FILE__ ).'templates/ads.php');
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
    }
}