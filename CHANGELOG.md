# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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
