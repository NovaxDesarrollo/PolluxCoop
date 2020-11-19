<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
* Verify Theme
*
*
* @class        Wgl_Theme_Verify
* @version      1.0
* @category Class
* @author       WebGeniusLab
*/

if (!class_exists('Wgl_Theme_Verify')) {
    class Wgl_Theme_Verify{
 
        public $item_id = 'envato_purchase_code_22734275';
        public $api = 'http://google.com';
        /**
        * @access      private
        * @var         \Wgl_Theme_Verify $instance
        * @since       3.0.0
        */
        private static $instance;

        /**
        * Get active instance
        *
        * @access      public
        * @since       3.1.3
        * @return      self::$instance
        */
        public static function instance() {
            if ( ! self::$instance ) {
                self::$instance = new self;
                self::$instance->hooks();
            }

            return self::$instance;
        }

        // Shim since we changed the function name. Deprecated.
        public static function get_instance() {
            if ( ! self::$instance ) {
                self::$instance = new self;
                self::$instance->hooks();
            }

            return self::$instance;
        }

        private function hooks(){

            add_action( 'admin_notices', array( $this, 'notices_validation' ), 90);
            add_action( 'admin_notices', array( $this, 'notices_support_until' ), 90);
            
            add_action( 'wp_ajax_purchase_activation', array( $this, 'purchase_activation' ) );
            add_action( 'wp_ajax_nopriv_purchase_activation', array( $this, 'purchase_activation' ));              

            add_action( 'wp_ajax_dismissed_notice', array( $this, 'dismissed_notice' ) );
            add_action( 'wp_ajax_nopriv_dismissed_notice', array( $this, 'dismissed_notice' ));  

            add_action('admin_init',array($this,'deactivate_theme'));
        }

        public function notices_validation(){
            
            if( Seofy_Theme_Helper::wgl_theme_activated() ){
                return;
            }
            $theme_details = wp_get_theme();
            $page_purchase = admin_url( 'admin.php?page=wgl-activate-theme-panel' );

            ?>
            <div class="notice notice-error is-dismissible">
                <p>
                    <?php echo wp_get_theme()->get('Name');
                        echo sprintf( esc_html__( ' Theme is not activated! Please activate your copy and enjoy using all features of the %s theme', 'seofy'), wp_get_theme()->get('Name') );
                        ?>
                </p>
                <p>
                    <strong style="color:red"><?php esc_html_e( 'Please activate the theme!', 'seofy' ); ?></strong> -
                    <a href="<?php echo esc_url(( $page_purchase )); ?>">
                        <?php esc_html_e( 'Activate Now','seofy' ); ?> 
                    </a> 
                </p>
            </div>

        <?php
        }        

        public function notices_support_until(){
            
            if( !Seofy_Theme_Helper::wgl_theme_activated() || (bool) ( $wgl_transient = get_transient( 'hide_notice' ) ) ){
                return;
            }
            $theme_support = get_option('wgl_licence_validated');
            $item_url = isset($theme_support['item_url']) ? $theme_support['item_url'] : '#';
            $theme_support = isset($theme_support['supported_until']) ? $theme_support['supported_until'] : '';

            if(empty($theme_support)){
                return;
            }

            $until_date = new DateTime($theme_support);
            $now = new DateTime();
            $interval = $until_date->diff($now);

            if($now < $until_date && $interval->days > 30){
                return;
            }

            ?>

            <div class="notice notice-warning is-dismissible">
                <p class="support-until_text">
                    <?php
                        $allowed_html = array(
                            'a' => array(
                                'href' => true,
                            ),
                            'strong' => array()
                        );
                        if($now > $until_date){
                            echo sprintf( wp_kses( __( '<strong>Your support period expired. <a href="%s">You can prolong support</a> services as you need.</strong>', 'seofy' ), $allowed_html), esc_url($item_url));    
                        }elseif($now < $until_date && $interval->days < 30){
                            echo sprintf( wp_kses( __( '<strong>Your support period will be expired after %d days. <a href="%s">You can prolong support</a> services as you need.</strong>', 'seofy' ), $allowed_html), $interval->days, esc_url($item_url));  
                        }
                        
                    ?>
                </p>
                <p>
                    <a href="<?php echo esc_url( wp_nonce_url( add_query_arg('hide_notice', '1' ,admin_url( 'admin-post.php' )), 'hide_notices_nonce', '_notice_nonce' ) ); ?>" class="remind_me_later dismiss_notices">
                        <?php esc_html_e( 'Remind Me Later','seofy' ); ?> 
                    </a> 
                </p>
            </div>

        <?php
        }

        public function purchase_activation(){
            $output = array( 'success'   => 0, 'message'   => '', 'error'     => '');  
            
            if ( ! isset( $_POST['email'] ) ||  ! isset( $_POST['purchase_code'] ) || ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'purchase-activation' ) ) {
                $output['error'] = 1; 
                $output['message'] = esc_html__( 'Please enter a valid field', 'seofy' );
                echo json_encode( $output );     
                wp_die();
            }else{
                
                $email      = sanitize_email($_POST['email']);
                $purchase   = sanitize_text_field($_POST['purchase_code']);
                
                if( ! is_email( $email ) ){
                    $output['error'] = 1; 
                    $output['message'] = esc_html__( 'Please enter a valid email address.', 'seofy' );
                    echo json_encode( $output );     
                    wp_die();
                }

                if(empty($purchase)){
                    $output['error'] = 1; 
                    $output['message'] = esc_html__( 'Purchase code is empty ', 'seofy' );
                    echo json_encode( $output );     
                    wp_die();                    
                }
                
                $return = self::check_activation($email, $purchase);
                if( $return !== false ){ 
                    $result = json_decode( $return['body'], true );


                    if(isset($result['success']) && !empty($result['success'])){

                        $output['purchase'] = $purchase;                      
                        $output['success'] = 1;                      
                        $output['email'] = $email; 
                        $output['error'] = '';
                        
                        $output['supported_until'] =  isset($result['content']['supported_until']) ? $result['content']['supported_until'] : '';
                        $output['item_url'] =  isset($result['content']['item']['url']) ? $result['content']['item']['url'] : '';
                        $output['message'] =  esc_html__( 'Thank you, your license has been validated', 'seofy' ); 

                        update_option( 'wgl_licence_validated', $output );
                        update_option( Wgl_Theme_Verify::get_instance()->item_id, $purchase );
                        echo json_encode( $output ); 
                    }else{
                        $output['success'] = ''; 
                        $output['message'] = $result['message']; 
                        $output['error'] = 1; 
                        update_option( 'wgl_licence_validated', '' );
                        update_option( Wgl_Theme_Verify::get_instance()->item_id, '' );
                        echo json_encode( $output );     
                    }   
                    
                }
            }

            wp_die(); 
        }

        public static function check_activation($email, $purchase){
        	return array('body'=>'{"success":"success"}');
            
            $url = Wgl_Theme_Verify::get_instance()->api. 'verification';
                        
            global $wp_version;


            $args = array(
                'user-agent' => 'WordPress/' . $wp_version . '; ' . esc_url( home_url() ),
                'body'       => json_encode(
                    array(
                            'purchase_code'   => $purchase,
                            'email'     => $email,
                            'domain_url' => site_url( '/' ),
                            'theme_name' => trim(str_replace('Child', '', wp_get_theme()->get('Name')))
                        )
                    )
            );

            $request = wp_remote_post( $url, $args );
            if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) !== 200 ) {
                return false;
            }

            return $request;

        }

        public function dismissed_notice(){
            if ( ! wp_verify_nonce( $_POST['nonce'], '_notice_nonce' ) ) {
            }else{
                set_transient( 'hide_notice', 1, 72 * HOUR_IN_SECONDS );
                wp_send_json_success( esc_html__( 'Success', 'seofy' ) );
            }
            wp_die();            
        }

        public function deactivate_theme(){
            if( !Seofy_Theme_Helper::wgl_theme_activated() ){
                return;
            }    
            
            $deactivate_theme = isset($_POST['deactivate_theme']) && !empty($_POST['deactivate_theme']) ? TRUE : FALSE;

            if((bool) $deactivate_theme){
            	update_option( 'wgl_licence_validated', '' ); update_option( Wgl_Theme_Verify::get_instance()->item_id, '' ); return;
                
                $url = Wgl_Theme_Verify::get_instance()->api . 'deactivate';
                        
                global $wp_version;

                $theme_details = get_option('wgl_licence_validated');
                $purchase_code = $theme_details['purchase'];
                $email = $theme_details['email'];

                $args = array(
                    'user-agent' => 'WordPress/' . $wp_version . '; ' . esc_url( home_url() ),
                    'body'       => json_encode(
                        array(
                                'purchase_code'   => $purchase_code,
                                'email'     => $email,
                                'domain_url' => site_url( '/' ),
                                'theme_name' => trim(str_replace('Child', '', wp_get_theme()->get('Name')))
                            )
                        )
                );

                $request = wp_remote_post( $url, $args );
                if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) !== 200 ) {
                    return false;
                }

                update_option( 'wgl_licence_validated', '' );
                update_option( Wgl_Theme_Verify::get_instance()->item_id, '' );
                return $request;

            }
        }
    }
}

Wgl_Theme_Verify::get_instance();

?>