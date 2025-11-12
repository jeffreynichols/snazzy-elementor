# Snazzy Elementor

A WordPress plugin that brings beautiful, stylized Google Maps to Elementor using curated styles from Snazzy Maps.

## Requirements

- WordPress 5.0 or higher
- Elementor 3.0.0 or higher
- PHP 7.4 or higher
- Google Maps API Key (get one at https://console.cloud.google.com/)

## Installation

1. Upload the plugin files to `/wp-content/plugins/snazzy-elementor/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The Snazzy Maps widget will appear in the Elementor editor under the 'General' category
4. Enter your Google Maps API Key in the widget settings

## Features

### Snazzy Maps Widget

- **Pre-styled map themes** from Snazzy Maps including:
  - Subtle Grayscale
  - Ultra Light with Labels
  - Shades of Grey (Dark)
  - Midnight Commander (Dark)
  - Apple Maps-esque
  - Black and White
  - Default (No Style)

- **Full Google Maps functionality**:
  - Custom location by address or latitude/longitude
  - Adjustable zoom levels (0-22)
  - Multiple map types (Roadmap, Satellite, Hybrid, Terrain)
  - Customizable controls (Zoom, Map Type, Street View, Fullscreen)
  - Draggable maps and scroll wheel zoom options

- **Unlimited markers** with:
  - Custom titles and descriptions
  - Info windows (click, hover, or always open)
  - Custom marker icons
  - Location by address or coordinates

- **Responsive design** with adjustable height and border radius

## Usage

1. Edit any page with Elementor
2. Drag the "Snazzy Maps" widget onto your canvas
3. In the widget settings:
   - Enter your Google Maps API Key
   - Choose a Snazzy Maps style from the dropdown
   - Set your map location (address or coordinates)
   - Adjust zoom level and height
   - Add markers with custom icons and info windows
   - Configure map controls and interaction options

## Getting a Google Maps API Key

1. Go to https://console.cloud.google.com/
2. Create a new project or select an existing one
3. Enable the "Maps JavaScript API" and "Geocoding API"
4. Create credentials (API Key)
5. **Configure API Key Restrictions:**
   - Go to "Credentials" in Google Cloud Console
   - Click on your API key
   - Under "Application restrictions":
     - Choose "HTTP referrers (web sites)"
     - Add your website URLs (e.g., `yourdomain.com/*`, `*.yourdomain.com/*`)
   - Under "API restrictions":
     - Choose "Restrict key"
     - Select "Maps JavaScript API" and "Geocoding API"
   - Click "Save"
6. Enable billing for your Google Cloud project (required for Maps API)
7. Copy the API key and paste it in the widget settings

### Troubleshooting: ApiTargetBlockedMapError

If you see this error in the browser console, your API key restrictions are blocking the map:

**Solution:**
1. Go to https://console.cloud.google.com/apis/credentials
2. Click on your API key
3. Under "Application restrictions", add your website domain:
   - `yoursite.com/*`
   - `*.yoursite.com/*` (for subdomains)
   - For local development, add: `localhost/*`
4. Make sure "Maps JavaScript API" and "Geocoding API" are enabled
5. Save and wait a few minutes for changes to propagate

## File Structure

```
snazzy-elementor/
├── snazzy-elementor.php        # Main plugin file
├── widgets/
│   ├── snazzy-maps-widget.php  # Snazzy Maps widget
│   └── sample-widget.php       # Example widget
├── assets/
│   ├── css/
│   │   └── snazzy-elementor.css  # Widget styles
│   └── js/
│       ├── snazzy-maps.js        # Google Maps integration
│       └── snazzy-elementor.js   # General scripts
└── includes/                     # Additional utilities
```

## About Snazzy Maps

All map styles are sourced from [Snazzy Maps](https://snazzymaps.com/), a repository of free, beautiful Google Maps styles. All styles are licensed under Creative Commons and completely free to use.
