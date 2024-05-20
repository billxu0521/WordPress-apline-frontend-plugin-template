<?php

 /**
 * @link              https://billxu.net
 * @since             0.1.0
 * @package           FVP
 *
 * @wordpress-plugin
 * Plugin Name:       frontend-viewer-plugin
 * Plugin URI:        https://oberonlai.blog
 * Description:       frontend-viewer-plugin Plugins
 * Version:           0.1.0
 * Author:            billxu
 * Author URI:        https://billxu.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt

 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

define('FVP_VERSION', '0.1.0');
define('FVP_NAME', plugin_basename(__FILE__));
define('FVP_DIR', plugin_dir_path(__FILE__));
define('FVP_URI', plugin_dir_url(__FILE__));
define('FVP_INC', trailingslashit(FVP_DIR . 'src/inc'));


// Check main class exists
if (!class_exists('FVP_Main')) {

  // Define main class
  class FVP_Main {
    public function __construct() {
      add_filter( 'template_include', array($this, 'my_plugin_template_include') );
      add_action( 'wp_enqueue_scripts', array($this, 'my_plugin_enqueue_scripts') );
    }

    public function my_plugin_template_include( $template ) {
      // Check if on a specific page slug
      if ( is_page( 'my-page-slug' ) ) {
        // Use your custom template file
        $template = FVP_DIR . 'views/custom-template.php';
      }

      return $template;
    }

    public function my_plugin_enqueue_scripts() {
      // Check if on a specific page slug
      if ( is_page( 'my-page-slug' ) ) {
        // Add Alpine.js
        wp_enqueue_script( 'alpine-ajax', 'https://cdn.jsdelivr.net/npm/@imacrayon/alpine-ajax@0.6.0/dist/cdn.min.js', array(), '', true );
        wp_enqueue_script( 'alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', array(), '2.0.0', true );

        wp_enqueue_script( 'custom-js', FVP_URI . 'assets/js/custom.js', array(), '1.0.0', true );
        wp_enqueue_script('custom-add-to-cart', plugin_dir_url(__FILE__) . 'assets/js/custom-add-to-cart.js', array('jquery'), '1.0.0', true);
        wp_localize_script('custom-add-to-cart', 'my_ajax_object', array(
            'cart_url' => wc_get_cart_url(),
            'api_nonce' => wp_create_nonce('wp_rest')
        ));
      

      }
    }

    
  }
}

new FVP_Main();
