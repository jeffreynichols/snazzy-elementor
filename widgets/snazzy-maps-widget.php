<?php
namespace Snazzy_Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Snazzy Maps Widget
 */
class Snazzy_Maps_Widget extends Widget_Base {

    public function get_name() {
        return 'snazzy_maps';
    }

    public function get_title() {
        return __( 'Snazzy Maps', 'snazzy-elementor' );
    }

    public function get_icon() {
        return 'eicon-google-maps';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    public function get_script_depends() {
        return [ 'snazzy-maps-js' ];
    }

    protected function register_controls() {

        // Map Settings Section
        $this->start_controls_section(
            'map_settings_section',
            [
                'label' => __( 'Map Settings', 'snazzy-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'google_api_key',
            [
                'label' => __( 'Google Maps API Key', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'description' => __( 'Enter your Google Maps API key. Get one at https://console.cloud.google.com/', 'snazzy-elementor' ),
                'placeholder' => 'AIzaSy...',
            ]
        );

        $this->add_control(
            'map_id',
            [
                'label' => __( 'Google Map ID', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'description' => __( 'Required for Advanced Markers. Create a Map ID in Google Cloud Console. Leave empty to use standard markers.', 'snazzy-elementor' ),
                'placeholder' => 'your-map-id',
            ]
        );

        $this->add_control(
            'snazzy_style',
            [
                'label' => __( 'Snazzy Maps Style', 'snazzy-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Default (No Style)', 'snazzy-elementor' ),
                    'wy' => __( 'WY - Clean Light', 'snazzy-elementor' ),
                    'ultra-light' => __( 'Ultra Light with Labels', 'snazzy-elementor' ),
                    'subtle-grayscale' => __( 'Subtle Grayscale', 'snazzy-elementor' ),
                    'interface-map' => __( 'Interface Map - Minimalist', 'snazzy-elementor' ),
                    'becomeadinosaur' => __( 'Becomeadinosaur - Simple', 'snazzy-elementor' ),
                    'map-no-labels' => __( 'Map Without Labels', 'snazzy-elementor' ),
                    'grayscale-no-labels' => __( 'Grayscale - No Labels', 'snazzy-elementor' ),
                    'shades-grey' => __( 'Shades of Grey (Dark)', 'snazzy-elementor' ),
                    'masik' => __( 'Masik - Subtle Grayscale', 'snazzy-elementor' ),
                    'bright-colors' => __( 'Bright Colors - No Labels', 'snazzy-elementor' ),
                    'subtle-greyscale' => __( 'Subtle Greyscale Map', 'snazzy-elementor' ),
                    'pale-dawn' => __( 'Pale Dawn - Pastel', 'snazzy-elementor' ),
                    'blue-water' => __( 'Blue Water - Grayscale', 'snazzy-elementor' ),
                    'mapbox' => __( 'Mapbox Style', 'snazzy-elementor' ),
                    'blue-essence' => __( 'Blue Essence', 'snazzy-elementor' ),
                    'aqua' => __( 'Aqua - Vintage', 'snazzy-elementor' ),
                    'jazzygreen' => __( 'Jazzy Green - Neon', 'snazzy-elementor' ),
                    'light-dream' => __( 'Light Dream', 'snazzy-elementor' ),
                    'light-monochrome' => __( 'Light Monochrome', 'snazzy-elementor' ),
                    'avocado-world' => __( 'Avocado World - Nature', 'snazzy-elementor' ),
                    'light-gray' => __( 'Light Gray', 'snazzy-elementor' ),
                    'retro' => __( 'Retro - Vintage', 'snazzy-elementor' ),
                    'bright-bubbly' => __( 'Bright & Bubbly', 'snazzy-elementor' ),
                    'lost-desert' => __( 'Lost in the Desert', 'snazzy-elementor' ),
                    'midnight-commander' => __( 'Midnight Commander (Dark)', 'snazzy-elementor' ),
                    'apple-maps' => __( 'Apple Maps-esque', 'snazzy-elementor' ),
                    'black-white' => __( 'Black and White', 'snazzy-elementor' ),
                ],
                'description' => __( 'Choose from 27 pre-styled map themes from Snazzy Maps', 'snazzy-elementor' ),
            ]
        );

        $this->add_control(
            'place_id',
            [
                'label' => __( 'Google Place ID', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'ChIJOwg_06VPwokRYv534QaPC8g',
                'placeholder' => __( 'ChIJOwg_06VPwokRYv534QaPC8g', 'snazzy-elementor' ),
                'description' => __( 'Enter a Google Place ID. Find Place IDs at https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder', 'snazzy-elementor' ),
            ]
        );

        $this->add_control(
            'map_lat',
            [
                'label' => __( 'Latitude (Optional)', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => '40.7128',
                'description' => __( 'Override location with specific latitude', 'snazzy-elementor' ),
            ]
        );

        $this->add_control(
            'map_lng',
            [
                'label' => __( 'Longitude (Optional)', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => '-74.0060',
                'description' => __( 'Override location with specific longitude', 'snazzy-elementor' ),
            ]
        );

        $this->add_control(
            'map_zoom',
            [
                'label' => __( 'Zoom Level', 'snazzy-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 12,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 22,
                    ],
                ],
            ]
        );

        $this->add_control(
            'map_type',
            [
                'label' => __( 'Map Type', 'snazzy-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'roadmap',
                'options' => [
                    'roadmap' => __( 'Road Map', 'snazzy-elementor' ),
                    'satellite' => __( 'Satellite', 'snazzy-elementor' ),
                    'hybrid' => __( 'Hybrid', 'snazzy-elementor' ),
                    'terrain' => __( 'Terrain', 'snazzy-elementor' ),
                ],
            ]
        );

        $this->add_responsive_control(
            'map_height',
            [
                'label' => __( 'Height', 'snazzy-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 400,
                ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .snazzy-map-container' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'show_center_marker',
            [
                'label' => __( 'Show Marker at Center Location', 'snazzy-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'snazzy-elementor' ),
                'label_off' => __( 'No', 'snazzy-elementor' ),
                'default' => 'yes',
                'description' => __( 'Display a marker at the map center location', 'snazzy-elementor' ),
            ]
        );

        $this->add_control(
            'center_marker_title',
            [
                'label' => __( 'Center Marker Title', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => __( 'Location name', 'snazzy-elementor' ),
                'condition' => [
                    'show_center_marker' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'center_marker_description',
            [
                'label' => __( 'Center Marker Description', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'placeholder' => __( 'Location details', 'snazzy-elementor' ),
                'condition' => [
                    'show_center_marker' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Map Controls Section
        $this->start_controls_section(
            'map_controls_section',
            [
                'label' => __( 'Map Controls', 'snazzy-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'zoom_control',
            [
                'label' => __( 'Zoom Control', 'snazzy-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'snazzy-elementor' ),
                'label_off' => __( 'Hide', 'snazzy-elementor' ),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'map_type_control',
            [
                'label' => __( 'Map Type Control', 'snazzy-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'snazzy-elementor' ),
                'label_off' => __( 'Hide', 'snazzy-elementor' ),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'street_view_control',
            [
                'label' => __( 'Street View Control', 'snazzy-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'snazzy-elementor' ),
                'label_off' => __( 'Hide', 'snazzy-elementor' ),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'fullscreen_control',
            [
                'label' => __( 'Fullscreen Control', 'snazzy-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'snazzy-elementor' ),
                'label_off' => __( 'Hide', 'snazzy-elementor' ),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'draggable',
            [
                'label' => __( 'Draggable', 'snazzy-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'snazzy-elementor' ),
                'label_off' => __( 'No', 'snazzy-elementor' ),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'scroll_wheel_zoom',
            [
                'label' => __( 'Scroll Wheel Zoom', 'snazzy-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Enable', 'snazzy-elementor' ),
                'label_off' => __( 'Disable', 'snazzy-elementor' ),
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Markers Section
        $this->start_controls_section(
            'markers_section',
            [
                'label' => __( 'Markers', 'snazzy-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'marker_place_id',
            [
                'label' => __( 'Google Place ID', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => __( 'ChIJ...', 'snazzy-elementor' ),
                'description' => __( 'Enter a Google Place ID', 'snazzy-elementor' ),
            ]
        );

        $repeater->add_control(
            'marker_lat',
            [
                'label' => __( 'Latitude (Optional)', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => '40.7128',
            ]
        );

        $repeater->add_control(
            'marker_lng',
            [
                'label' => __( 'Longitude (Optional)', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => '-74.0060',
            ]
        );

        $repeater->add_control(
            'marker_title',
            [
                'label' => __( 'Title', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Marker Title', 'snazzy-elementor' ),
            ]
        );

        $repeater->add_control(
            'marker_description',
            [
                'label' => __( 'Description', 'snazzy-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Marker description', 'snazzy-elementor' ),
            ]
        );

        $repeater->add_control(
            'marker_icon',
            [
                'label' => __( 'Custom Icon URL', 'snazzy-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'description' => __( 'Upload a custom marker icon (optional)', 'snazzy-elementor' ),
            ]
        );

        $this->add_control(
            'markers',
            [
                'label' => __( 'Map Markers', 'snazzy-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'marker_place_id' => 'ChIJOwg_06VPwokRYv534QaPC8g',
                        'marker_title' => __( 'New York', 'snazzy-elementor' ),
                        'marker_description' => __( 'The Big Apple', 'snazzy-elementor' ),
                    ],
                ],
                'title_field' => '{{{ marker_title }}}',
            ]
        );

        $this->add_control(
            'info_window_open',
            [
                'label' => __( 'Info Window Default State', 'snazzy-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'click',
                'options' => [
                    'click' => __( 'Open on Click', 'snazzy-elementor' ),
                    'hover' => __( 'Open on Hover', 'snazzy-elementor' ),
                    'always' => __( 'Always Open (First Marker)', 'snazzy-elementor' ),
                    'none' => __( 'Disabled', 'snazzy-elementor' ),
                ],
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
            'map_border_radius',
            [
                'label' => __( 'Border Radius', 'snazzy-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .snazzy-map-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $widget_id = $this->get_id();

        if ( empty( $settings['google_api_key'] ) ) {
            echo '<div class="snazzy-maps-notice">' . __( 'Please enter your Google Maps API Key in the widget settings.', 'snazzy-elementor' ) . '</div>';
            return;
        }

        // Prepare map data
        $map_data = [
            'apiKey' => $settings['google_api_key'],
            'mapId' => $settings['map_id'],
            'placeId' => $settings['place_id'],
            'lat' => $settings['map_lat'],
            'lng' => $settings['map_lng'],
            'zoom' => $settings['map_zoom']['size'],
            'mapType' => $settings['map_type'],
            'snazzyStyle' => $settings['snazzy_style'],
            'zoomControl' => $settings['zoom_control'] === 'yes',
            'mapTypeControl' => $settings['map_type_control'] === 'yes',
            'streetViewControl' => $settings['street_view_control'] === 'yes',
            'fullscreenControl' => $settings['fullscreen_control'] === 'yes',
            'draggable' => $settings['draggable'] === 'yes',
            'scrollwheel' => $settings['scroll_wheel_zoom'] === 'yes',
            'markers' => [],
            'infoWindowState' => $settings['info_window_open'],
            'showCenterMarker' => $settings['show_center_marker'] === 'yes',
            'centerMarkerTitle' => $settings['center_marker_title'],
            'centerMarkerDescription' => $settings['center_marker_description'],
        ];

        // Add markers
        if ( ! empty( $settings['markers'] ) ) {
            foreach ( $settings['markers'] as $marker ) {
                $marker_data = [
                    'placeId' => $marker['marker_place_id'],
                    'lat' => $marker['marker_lat'],
                    'lng' => $marker['marker_lng'],
                    'title' => $marker['marker_title'],
                    'description' => $marker['marker_description'],
                ];

                if ( ! empty( $marker['marker_icon']['url'] ) ) {
                    $marker_data['icon'] = $marker['marker_icon']['url'];
                }

                $map_data['markers'][] = $marker_data;
            }
        }

        ?>
        <div class="snazzy-maps-wrapper">
            <div class="snazzy-map-container" id="snazzy-map-<?php echo esc_attr( $widget_id ); ?>"
                 data-map-settings="<?php echo esc_attr( json_encode( $map_data ) ); ?>">
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var widgetId = view.getID();

        if ( ! settings.google_api_key ) {
            #>
            <div class="snazzy-maps-notice">
                <?php _e( 'Please enter your Google Maps API Key in the widget settings.', 'snazzy-elementor' ); ?>
            </div>
            <#
            return;
        }

        var mapData = {
            apiKey: settings.google_api_key,
            mapId: settings.map_id,
            placeId: settings.place_id,
            lat: settings.map_lat,
            lng: settings.map_lng,
            zoom: settings.map_zoom.size,
            mapType: settings.map_type,
            snazzyStyle: settings.snazzy_style,
            zoomControl: settings.zoom_control === 'yes',
            mapTypeControl: settings.map_type_control === 'yes',
            streetViewControl: settings.street_view_control === 'yes',
            fullscreenControl: settings.fullscreen_control === 'yes',
            draggable: settings.draggable === 'yes',
            scrollwheel: settings.scroll_wheel_zoom === 'yes',
            markers: [],
            infoWindowState: settings.info_window_open,
            showCenterMarker: settings.show_center_marker === 'yes',
            centerMarkerTitle: settings.center_marker_title,
            centerMarkerDescription: settings.center_marker_description
        };

        if ( settings.markers ) {
            _.each( settings.markers, function( marker ) {
                var markerData = {
                    placeId: marker.marker_place_id,
                    lat: marker.marker_lat,
                    lng: marker.marker_lng,
                    title: marker.marker_title,
                    description: marker.marker_description
                };

                if ( marker.marker_icon && marker.marker_icon.url ) {
                    markerData.icon = marker.marker_icon.url;
                }

                mapData.markers.push( markerData );
            });
        }
        #>
        <div class="snazzy-maps-wrapper">
            <div class="snazzy-map-container" id="snazzy-map-{{{ widgetId }}}"
                 data-map-settings="{{ JSON.stringify( mapData ) }}">
            </div>
        </div>
        <?php
    }
}
