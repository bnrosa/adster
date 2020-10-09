<?php
   

class AdsterMetaboxes {

    private $metaboxes = [
        [
            'id' =>'adster_template',
            'title' => 'Ad Template',
            'options' => ['default']
        ],
        [
            'id' =>'adster_bg_color',
            'title' => 'Ad Background Color',
            'options' => ['black', 'orange', 'blue']
        ],
        [
            'id' => 'adster_countdown'
        ]
    ];

    public function run(){
        add_action( 'add_meta_boxes', array($this, 'adster_register_meta_boxes'));
        add_action( 'save_post_adster_custom_ad', array($this, 'adster_custom_ad_save_post'), 10, 2 );
    }

    public function adster_register_meta_boxes() {
        foreach ($this->metaboxes as $metabox) {
            if(isset($metabox['title'])){
                add_meta_box(
                    $metabox['id'],
                    $metabox['title'],
                    array($this, 'adster_details_meta_box'),
                    'adster_custom_ad',
                    'advanced',
                    'high',
                    $metabox
                );
            }
        }

        add_meta_box(
            'adster_countdown',
            'Ad countdown',
            array($this, 'get_adster_countdown'),
            'adster_custom_ad'
        );
        
        add_meta_box(
            'adster_shortcode',
            'Ad shortcode',
            array($this, 'get_adster_shortcode'),
            'adster_custom_ad'
        );

        add_meta_box(
            'adster_preview',
            'Ad preview',
            array($this, 'get_adster_preview'),
            'adster_custom_ad',
            'advanced',
            'high',
            $metabox
        );    
    }

    public function get_adster_preview($post){
        ?> <iframe src="" frameborder="0">
            <?php include(plugin_dir_path( __FILE__ ).'../templates/ads.php'); ?>
        </iframe>
        <?php 
    }

    public function get_adster_countdown($post){
        $value = get_post_meta( $post->ID, 'adster_countdown', true );
        wp_nonce_field( basename( __FILE__ ), 'adster-ads-details' ); 
        $time = $value - strtotime('now');
        ?>
        
        <div class="wrap">
            <p>Plese set the remaining time in <strong>HOURS</strong></p>
            <input type="text" value="<?php echo esc_attr( $value) ?>" name="adster_countdown">

            <p>Expires at <?php echo date('Y-m-d H:i:s', $value);?>.</p>
            <p>Expires within <?php echo $time > 0 ? date('h', $time) : 0;?> hours.</p>
        </div>
        <?php 
    }

    public function get_adster_shortcode($post){
        echo '<p>';
        echo '<strong>[adster_custom_ad id="'.$post->ID.'"]</strong>';
        echo '</p>';
    }

    public function adster_details_meta_box( $post, $metabox ) {
        $value = get_post_meta( $post->ID, $metabox['id'], true );
        wp_nonce_field( basename( __FILE__ ), 'adster-ads-details' ); ?>
        <div class="wrap">
            <select name="<?php echo $metabox['id'] ?>" class="postbox">
                <?php
                    foreach ($metabox['args']['options'] as $option) {
                       echo '<option '.selected( $value, $option ).' value="'.esc_attr( $option).'">'.esc_html($option).'</option>';
                    }
                ?>
             </select>
        </div>
        <?php 
    }

    public function adster_custom_ad_save_post( $post_id, $post) {
        if (! isset( $_POST['adster-ads-details'] ) ||
            ! wp_verify_nonce( $_POST['adster-ads-details'], basename( __FILE__ ) )
        ) {
            return;
        }
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
        if ( wp_is_post_autosave( $post_id ) ||
            wp_is_post_revision( $post_id )
        ) {
            return;
        }

        foreach($this->metaboxes as $metabox){
            $old_value = get_post_meta( $post_id, $metabox['id'], true );
            $new_value = isset( $_POST[$metabox['id']] ) ? wp_strip_all_tags( $_POST[$metabox['id']] ): '';
            
            if($metabox['id'] == 'adster_countdown'){
                $new_value = strtotime('now +'.$new_value.' hour');
            }
            if ( ! $new_value && $old_value ) {
                delete_post_meta( $post_id, $metabox['id'] );
            } elseif ( $new_value !== $old_value ) {
                update_post_meta( $post_id, $metabox['id'], $new_value );
            }
        }       
    }
}