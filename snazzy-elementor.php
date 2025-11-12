<?php
/**
 * Plugin Name: Snazzy Elementor
 * Description: Embed Google Maps with beautiful Snazzy Maps styles in Elementor
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: snazzy-elementor
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

define( 'SNAZZY_ELEMENTOR_VERSION', '1.0.0' );
define( 'SNAZZY_ELEMENTOR_PATH', plugin_dir_path( __FILE__ ) );
define( 'SNAZZY_ELEMENTOR_URL', plugin_dir_url( __FILE__ ) );

/**
 * Main Snazzy Elementor Class
 */
final class Snazzy_Elementor {

    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    public function init() {
        // Check if Elementor is installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_elementor' ] );
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, '3.0.0', '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Register widgets
        add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

        // Register widget styles
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

        // Register widget scripts
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
    }

    public function register_widgets( $widgets_manager ) {
        require_once( SNAZZY_ELEMENTOR_PATH . 'widgets/sample-widget.php' );
        $widgets_manager->register( new \Snazzy_Elementor\Widgets\Sample_Widget() );

        require_once( SNAZZY_ELEMENTOR_PATH . 'widgets/snazzy-maps-widget.php' );
        $widgets_manager->register( new \Snazzy_Elementor\Widgets\Snazzy_Maps_Widget() );
    }

    public function widget_styles() {
        wp_enqueue_style( 'snazzy-elementor', SNAZZY_ELEMENTOR_URL . 'assets/css/snazzy-elementor.css', [], SNAZZY_ELEMENTOR_VERSION );
    }

    public function widget_scripts() {
        wp_register_script( 'snazzy-elementor', SNAZZY_ELEMENTOR_URL . 'assets/js/snazzy-elementor.js', [ 'jquery' ], SNAZZY_ELEMENTOR_VERSION, true );
        wp_register_script( 'snazzy-maps-js', SNAZZY_ELEMENTOR_URL . 'assets/js/snazzy-maps.js', [ 'jquery' ], SNAZZY_ELEMENTOR_VERSION, true );
    }

    public function admin_notice_missing_elementor() {
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'snazzy-elementor' ),
            '<strong>' . esc_html__( 'Snazzy Elementor', 'snazzy-elementor' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'snazzy-elementor' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    public function admin_notice_minimum_elementor_version() {
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'snazzy-elementor' ),
            '<strong>' . esc_html__( 'Snazzy Elementor', 'snazzy-elementor' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'snazzy-elementor' ) . '</strong>',
            '3.0.0'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
}

Snazzy_Elementor::instance();
