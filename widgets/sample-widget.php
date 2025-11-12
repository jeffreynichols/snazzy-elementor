<?php
namespace Snazzy_Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Sample Elementor Widget
 */
class Sample_Widget extends Widget_Base {

    public function get_name() {
        return 'snazzy_sample';
    }

    public function get_title() {
        return __( 'Snazzy Sample', 'snazzy-elementor' );
    }

    public function get_icon() {
        return 'eicon-star';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'snazzy-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Hello World', 'snazzy-elementor' ),
                'placeholder' => __( 'Enter your title', 'snazzy-elementor' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'This is a sample widget description.', 'snazzy-elementor' ),
                'placeholder' => __( 'Enter your description', 'snazzy-elementor' ),
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'snazzy-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'snazzy-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .snazzy-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="snazzy-sample-widget">
            <h2 class="snazzy-title"><?php echo esc_html( $settings['title'] ); ?></h2>
            <p class="snazzy-description"><?php echo esc_html( $settings['description'] ); ?></p>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <div class="snazzy-sample-widget">
            <h2 class="snazzy-title">{{{ settings.title }}}</h2>
            <p class="snazzy-description">{{{ settings.description }}}</p>
        </div>
        <?php
    }
}
