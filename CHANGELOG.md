# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.9] - 2025-01-12

### Fixed
- Fixed "A Map's styles property cannot be set when a mapId is present" console error
- Snazzy Maps styles are now only applied when NO Map ID is provided
- When Map ID is present, styles must be configured in Google Cloud Console

### Changed
- Updated Map ID control description to clarify styles limitation
- Updated README with clear explanation of Map ID vs. Snazzy styles behavior
- **Important**: Users must choose: Use Map ID (for Advanced Markers) OR use Snazzy style dropdown

### Technical
- Added conditional logic to only set `styles` property when `mapId` is not present
- Map initialization now checks for Map ID before applying Snazzy styles array

## [1.0.8] - 2025-01-12

### Added
- Google Map ID field in widget settings
- Map ID is now passed to map initialization options
- Documentation for creating Map IDs in Google Cloud Console

### Fixed
- "The map is initialized without a valid Map ID" console warning
- Advanced Markers now work properly when Map ID is provided

### Changed
- Map ID is optional but recommended (required for AdvancedMarkerElement to work without warnings)
- Updated README with Map ID setup instructions

## [1.0.7] - 2025-01-12

### Changed
- **BREAKING CHANGE**: Updated to use new Google Maps Places API (New) instead of legacy PlacesService
- Migrated from deprecated `google.maps.Marker` to `google.maps.marker.AdvancedMarkerElement`
- Migrated from deprecated `google.maps.places.PlacesService.getDetails()` to `google.maps.places.Place.fetchFields()`
- Added `marker` library to Google Maps API loading
- Updated API requirements to use "Places API (New)" instead of legacy "Places API"

### Technical
- Replaced `PlacesService` with new `Place` class and promise-based `fetchFields()` method
- Updated all marker instances to use `AdvancedMarkerElement` for better performance
- Changed InfoWindow `open()` calls to use new object-based syntax with `anchor` parameter
- Added error handling with `.catch()` for Promise-based Place API calls
- Custom marker icons temporarily disabled (requires PinElement migration - future update)

### Fixed
- Eliminated deprecation warnings for Google Maps APIs (PlacesService and Marker)
- Improved compatibility with Google Maps JavaScript API as of March 2025

## [1.0.6] - 2025-01-12

### Changed
- Updated plugin name from "Snazzy Elementor" to "Snazzy Maps in Elementor"
- Updated all references throughout codebase (PHP, JavaScript, CSS, documentation)

## [1.0.5] - 2025-01-12

### Changed
- **BREAKING CHANGE**: Replaced address/location name input with Google Place ID
- Map center location now uses Google Place ID instead of address geocoding
- Additional markers now use Google Place ID instead of address
- Updated to use Places API instead of Geocoding API for location resolution
- Latitude/longitude override fields still available for precise positioning

### Updated
- README.md with comprehensive Place ID documentation and examples
- Google Maps API requirements now include Places API instead of Geocoding API
- Added Place ID Finder tool link to widget control descriptions

### Technical
- Replaced `Geocoder.geocode()` calls with `PlacesService.getDetails()` in JavaScript
- Updated widget controls from `map_location` to `place_id`
- Updated marker controls from `marker_location` to `marker_place_id`
- Default Place ID now set to New York City (ChIJOwg_06VPwokRYv534QaPC8g)

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
- Initial release of Snazzy Maps in Elementor plugin
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
