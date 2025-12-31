# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Common Commands

### Development
- `php artisan serve` - Start Laravel development server
- `npm run dev` - Start Vite development server for frontend assets
- `npm run build` - Build production assets

### Testing
- `php artisan test` or `vendor/bin/phpunit` - Run PHPUnit tests
- Tests are organized in `tests/Unit` and `tests/Feature` directories

### Code Quality
- `vendor/bin/pint` - Run Laravel Pint for code formatting (configured in pint.json)
- `vendor/bin/pint --test` - Check code formatting without making changes

### IDE Helpers
- `composer run-ide-helper` - Generate IDE helper files for better autocomplete
- This runs: ide-helper:generate, ide-helper:meta, ide-helper:models, ide-helper:eloquent

### Translation Management
- `composer run-translation` - Manage translations
- This runs: translations:reset, translations:import, translations:find

### Data Import
- `php artisan import:pandemic-data` - Import pandemic data
- `php artisan export:pandemic-seeder` - Export pandemic data as seeders

## Architecture Overview

This is a **Laravel 10** application serving as a Malaysia Pandemic Dashboard with the following key components:

### Tech Stack
- **Backend**: Laravel 10 with PHP 8.3
- **Admin Panel**: Filament 3.2+ for admin interface
- **Frontend**: Livewire 3.4+ for reactive components
- **Styling**: TailwindCSS with Vite build system
- **Database**: Configurable (defaults in phpunit.xml suggest array driver for testing)

### Key Packages
- **filament/filament**: Admin panel framework
- **livewire/livewire**: Frontend reactivity without JavaScript frameworks
- **flowframe/laravel-trend**: Data trending and analytics
- **artesaos/seotools**: SEO optimization
- **silviolleite/laravelpwa**: Progressive Web App features

### Application Structure

#### Models (app/Models/)
Core pandemic data models including:
- Cases: `CasesMalaysia`, `CasesState` 
- Deaths: `DeathsMalaysia`, `DeathsState`
- Healthcare: `Hospital`, `ICU`, `PKRC`
- Testing: `TestMalaysia`, `TestState`
- Vaccination: `VaxMalaysia`, `VaxState`, `VaxRegMalaysia`, `VaxRegState`
- Population and Cluster data

#### Livewire Components (app/Livewire/)
Real-time dashboard components organized by feature:
- `PandemicDashboard/` - Main dashboard with Malaysia overview, state cases, graphs
- `PandemicState/` - State-specific pandemic data and visualizations
- `PandemicVaccination/` - Vaccination tracking and statistics
- `ClusterSearch` - Cluster search functionality

#### Filament Admin Resources (app/Filament/Resources/)
Admin interfaces for all pandemic data models with CRUD operations

#### Services (app/Http/Services/)
- `Covid/` - Business logic for cases, healthcare, vaccination data
- `Graph/` - Chart and visualization services
- `ImportPandemicService` - Data import functionality

#### Public Routes
- `/` - Main pandemic dashboard
- `/clusters` - Cluster information
- `/state` - State-specific data
- `/vaccination` - Vaccination tracking
- `/locale/{locale}` - Language switching

### Data Flow
1. **Import**: Console commands import pandemic data from external sources
2. **Admin**: Filament provides admin interface for data management  
3. **Display**: Livewire components render real-time dashboard views
4. **Export**: Data export capabilities

### Key Features
- Multi-language support with translation management
- Real-time pandemic data visualization
- State-by-state breakdown
- Vaccination tracking and analytics
- Cluster monitoring
- Progressive Web App capabilities
- Admin panel for data management