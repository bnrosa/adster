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
        if(isset($args['id'])){
            $countdown = get_post_meta($args['id'], 'adster_countdown', true );
            $adster_bg_color = get_post_meta($args['id'], 'adster_bg_color', true );
        }
        if(isset($arg['title'])){
            $title = $args['title'];
        }
        else if(isset($args['id'])){
            $post_title = get_the_title($args['id']);
        }
		include(plugin_dir_path( __FILE__ ).'templates/ads.php');
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
    }
}