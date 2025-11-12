# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Snazzy Elementor is a WordPress plugin that brings beautifully styled Google Maps to Elementor using curated styles from Snazzy Maps. The primary widget allows users to embed Google Maps with pre-styled themes, multiple markers, and full Google Maps functionality. This is a no-build-system project - all PHP, CSS, and JavaScript files are used directly without compilation or bundling.

## Version Management

**IMPORTANT:** Always increment the version number before committing changes to GitHub.

Version numbers are located in two places in `snazzy-elementor.php`:
1. Plugin header comment: `Version: X.Y.Z` (line 5)
2. PHP constant: `define( 'SNAZZY_ELEMENTOR_VERSION', 'X.Y.Z' );` (line 15)

**Versioning scheme (Semantic Versioning):**
- **Major (X.0.0):** Breaking changes or major feature additions
- **Minor (1.X.0):** New features, backward compatible
- **Patch (1.0.X):** Bug fixes, small improvements

**Process:**
1. Make your code changes
2. Update both version numbers in `snazzy-elementor.php`
3. Commit with a descriptive message
4. Push to GitHub

Example: If current version is 1.0.1 and you fix a bug, update to 1.0.2.

## Architecture

### Plugin Bootstrap (`snazzy-elementor.php`)

The main plugin file follows the singleton pattern with `Snazzy_Elementor::instance()`. The initialization flow:

1. `plugins_loaded` hook fires `init()` method
2. Checks for Elementor installation and version compatibility
3. Hooks into Elementor's widget registration system via `elementor/widgets/register`
4. Enqueues styles and scripts on frontend

### Widget Registration Flow

Widgets are registered in the `register_widgets()` method in `snazzy-elementor.php`:
1. Require the widget file from `widgets/` directory
2. Instantiate the widget class
3. Call `$widgets_manager->register()` with the instance

All widgets must:
- Extend `Elementor\Widget_Base`
- Be in the `Snazzy_Elementor\Widgets` namespace
- Implement required methods: `get_name()`, `get_title()`, `get_icon()`, `get_categories()`, `register_controls()`, `render()`

### Widget Anatomy

Each widget has two rendering methods:
- `render()`: PHP-based rendering for frontend display
- `content_template()`: JavaScript template for live editing in Elementor editor

Controls are organized into sections (Content tab, Style tab, etc.) using `start_controls_section()` and `end_controls_section()`.

## Adding New Widgets

1. Create new PHP file in `widgets/` directory (e.g., `widgets/my-widget.php`)
2. Use namespace `Snazzy_Elementor\Widgets`
3. Class name should match filename in StudlyCase (e.g., `My_Widget`)
4. Register in `snazzy-elementor.php` by adding to `register_widgets()`:
   ```php
   require_once( SNAZZY_ELEMENTOR_PATH . 'widgets/my-widget.php' );
   $widgets_manager->register( new \Snazzy_Elementor\Widgets\My_Widget() );
   ```
5. Reference `widgets/sample-widget.php` for structure

## File Locations

- Widget files: `widgets/*.php`
- Frontend CSS: `assets/css/snazzy-elementor.css` (automatically enqueued on all pages)
- Frontend JS: `assets/js/snazzy-elementor.js` (registered but must be manually enqueued per widget if needed)
- Utility classes: `includes/` (create as needed)

## WordPress Context

This plugin requires:
- Elementor 3.0.0+ to be installed and active
- WordPress hooks are used throughout - understand action/filter system
- All text must be internationalized using `__()`, `esc_html__()`, etc. with 'snazzy-elementor' text domain
- Always escape output: `esc_html()`, `esc_attr()`, `esc_url()`, etc.

## Elementor-Specific Notes

- Widget icons use Elementor's icon library (see https://elementor.github.io/elementor-icons/)
- Category 'general' places widgets in the General category; create custom categories if needed
- Selectors in style controls use `{{WRAPPER}}` to scope CSS to the specific widget instance
- The `get_settings_for_display()` method retrieves all control values for rendering

## Snazzy Maps Widget Architecture

### Overview
The main widget (`widgets/snazzy-maps-widget.php`) integrates Google Maps JavaScript API with Snazzy Maps styling. It follows a data-attribute pattern where PHP renders a container with JSON-encoded settings, and JavaScript (`assets/js/snazzy-maps.js`) initializes the map.

### Snazzy Maps Styles
Styles are curated from snazzymaps.com and stored as JSON arrays in `assets/js/snazzy-maps.js` in the `snazzyStyles` object. Each style is a Google Maps styling array following Google's Maps JavaScript API styling specification.

**Current styles included:**
- `default`: No styling (standard Google Maps)
- `subtle-grayscale`: Light grayscale theme
- `ultra-light`: Minimal light theme with labels
- `shades-grey`: Dark grayscale theme
- `midnight-commander`: Dark blue/teal theme (Tron-like)
- `apple-maps`: Apple Maps-inspired with earth tones
- `black-white`: High contrast black and white

### Adding New Snazzy Maps Styles

1. Visit snazzymaps.com and find a style you like
2. Copy the JSON style array from the style's page
3. Open `assets/js/snazzy-maps.js`
4. Add the style to the `snazzyStyles` object with a unique key
5. Open `widgets/snazzy-maps-widget.php`
6. Add a new option to the `snazzy_style` control in the `register_controls()` method

### Google Maps API Integration

The widget requires a Google Maps API key with these APIs enabled:
- Maps JavaScript API (for rendering maps)
- Geocoding API (for converting addresses to coordinates)

The JavaScript handles:
- Loading Google Maps API dynamically
- Geocoding addresses to lat/lng coordinates
- Applying Snazzy Maps styles
- Creating markers with info windows
- Managing map controls and interactions

### Data Flow

1. User configures widget in Elementor editor
2. `render()` method outputs a div with `data-map-settings` attribute containing JSON
3. JavaScript reads the data attribute and initializes the map
4. If addresses are used, geocoding happens client-side
5. Map renders with selected style and markers

### Widget Dependencies

The widget declares script dependency on `snazzy-maps-js` via `get_script_depends()`, ensuring the JavaScript loads when the widget is used. The script is registered in `snazzy-elementor.php:74`.

## Testing Changes

Since this is a WordPress plugin:
1. Changes to PHP files require plugin reactivation or page refresh
2. CSS/JS changes may need cache clearing (hard refresh: Cmd+Shift+R / Ctrl+Shift+R)
3. Test widgets by editing a page in Elementor and dragging the widget onto the canvas
4. Use WordPress debug mode for error reporting (set `WP_DEBUG` to `true` in `wp-config.php`)
5. For Google Maps testing, ensure API key has proper restrictions and billing enabled
6. Test both address-based and coordinate-based locations
7. Check browser console for JavaScript errors if maps don't load

## Common Issues and Troubleshooting

### ApiTargetBlockedMapError
**Cause:** Google Maps API key restrictions are blocking requests from the current domain.

**Fix:**
1. Go to Google Cloud Console > Credentials
2. Edit the API key
3. Add the website domain to HTTP referrer restrictions (e.g., `yoursite.com/*`)
4. Ensure Maps JavaScript API and Geocoding API are enabled
5. Wait 2-5 minutes for changes to propagate

### Maps Not Loading
**Check:**
1. Browser console for specific error messages
2. API key is entered correctly in widget settings
3. Billing is enabled on Google Cloud project
4. Both "Maps JavaScript API" and "Geocoding API" are enabled
5. No JavaScript conflicts with other plugins (check for jQuery errors)

### Geocoding Fails
If markers or center location don't appear when using addresses:
1. Verify "Geocoding API" is enabled in Google Cloud Console
2. Check browser console for geocoding error messages
3. Try using latitude/longitude instead of addresses for troubleshooting
4. Ensure address format is recognizable by Google Maps (e.g., "New York, NY" or "Times Square, New York")
