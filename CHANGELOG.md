# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.4] - 2025-01-11

### Changed
- Updated plugin author to adPharos.com
- Added Author URI field pointing to https://adpharos.com

## [1.0.3] - 2025-01-11

### Added
- **Center location marker** - New option to automatically display a marker at the map center location
- Center marker title and description fields for info window
- Center marker info window respects the global info window behavior setting (click/hover/always open)

### Fixed
- Maps now properly highlight the center location with a marker, similar to Google Maps behavior
- Center marker can be toggled on/off via widget settings

## [1.0.2] - 2025-01-11

### Added
- **24 new Snazzy Maps styles** - Expanded from 7 to 27 total map styles
- New light/minimalist styles:
  - WY - Clean Light
  - Interface Map - Minimalist
  - Becomeadinosaur - Simple
  - Map Without Labels
  - Grayscale - No Labels
  - Masik - Subtle Grayscale
  - Subtle Greyscale Map
  - Pale Dawn - Pastel
  - Light Gray
  - Light Monochrome
- New colorful styles:
  - Bright Colors - No Labels
  - Blue Water - Grayscale
  - Blue Essence
  - Bright & Bubbly
  - Light Dream
  - Avocado World - Nature
  - Mapbox Style
- New vintage/themed styles:
  - Aqua - Vintage
  - Jazzy Green - Neon
  - Retro - Vintage
  - Lost in the Desert

### Changed
- Updated style dropdown description to reflect 27 available styles
- Reorganized style dropdown for better categorization

## [1.0.1] - 2025-01-11

### Fixed
- Fixed Google Maps API initialization race condition causing "google.maps.Geocoder is not a constructor" error
- Added proper API ready check before initializing maps
- Added `loading=async` parameter to Google Maps API URL
- Added error handler for API loading failures

### Added
- Comprehensive API key restriction setup documentation
- Troubleshooting section for common Google Maps API errors
- Version management guidelines in CLAUDE.md

## [1.0.0] - 2025-01-11

### Added
- Initial release of Snazzy Elementor plugin
- Google Maps widget with Snazzy Maps styling
- 7 curated map styles from Snazzy Maps:
  - Subtle Grayscale
  - Ultra Light with Labels
  - Shades of Grey (Dark)
  - Midnight Commander (Dark)
  - Apple Maps-esque
  - Black and White
  - Default (No Style)
- Multiple marker support with custom icons
- Info windows with click/hover/always-open modes
- Full Google Maps controls (zoom, map type, street view, fullscreen)
- Address or coordinate-based location
- Adjustable zoom levels (0-22)
- Multiple map types (Roadmap, Satellite, Hybrid, Terrain)
- Responsive design with customizable height and border radius
- Comprehensive documentation (README.md and CLAUDE.md)
