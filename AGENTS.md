# Inertia Lookup - Agent Development Guide

This guide provides essential information for agentic coding assistants working on this Laravel Inertia package.

## Commands

### Testing
- `composer test` - Run all tests with Pest
- `vendor/bin/pest` - Run all tests
- `vendor/bin/pest tests/ExampleTest.php` - Run single test file
- `vendor/bin/pest --ci` - Run tests in CI mode (GitHub Actions)
- `composer test-coverage` - Run tests with coverage report

### Code Quality
- `composer analyse` - Run PHPStan static analysis (level 5)
- `vendor/bin/phpstan analyse` - Run PHPStan directly
- `vendor/bin/phpstan --error-format=github` - GitHub formatted output
- `composer format` - Format code with Laravel Pint
- `vendor/bin/pint` - Format code directly

### Preparation
- `composer prepare` - Discover package in testbench environment

## Code Style Guidelines

### Laravel Conventions
- **PHP Version**: 8.3+
- **Framework**: Laravel 12.x preferred (supports 11.x for compatibility)
- **Namespace**: `SoftPulze\InertiaLookup` (PSR-4)
- **Formatting**: PSR-12 enforced by Laravel Pint
- **Indentation**: 4 spaces, no tabs
- **Line Endings**: LF only
- **File Encoding**: UTF-8

### Naming Conventions
- **Classes**: PascalCase (e.g., `InertiaLookup`)
- **Methods**: camelCase (e.g., `getUserLookup`)
- **Variables**: camelCase, descriptive
- **Constants**: UPPER_SNAKE_CASE
- **Facades**: Use `@see` PHPDoc to reference main class
- **Test Files**: PascalCase with `Test.php` suffix (e.g., `LookupTest.php`)

### Code Style Principles
- **Simplicity First**: Prefer built-in Laravel helpers and facades
- **Performance**: Use Laravel's optimized methods, avoid unnecessary queries
- **Clean Code**: Single responsibility, small focused classes, minimal dependencies
- **Type Safety**: Use return types and typed parameters
- **No Debugging**: Never use `dd()`, `dump()`, or `ray()` in production code (enforced by ArchTest)

### Imports & Namespaces
- Group imports: Laravel/framework, third-party, local
- Alphabetically sort within groups
- Use fully qualified class names in PHPDoc annotations
- Avoid wildcard imports (`use Some\Namespace\*`)

### Testing Style (Pest PHP)
- Use `it()` for test descriptions: `it('can create lookup', function () { })`
- Use `expect()` for assertions: `expect($result)->toBeTrue()`
- Test names should be descriptive and business-focused
- Use ArchTest for architectural constraints
- Arrange-Act-Assert pattern

### Service Providers
- Extend `Spatie\PackageServiceProvider`
- Use `configurePackage()` method
- Define package name, config file, views, etc.
- Follow Spatie Laravel Package Tools conventions

### Facades
- Must extend `Illuminate\Support\Facades\Facade`
- Implement `getFacadeAccessor()` returning main class
- Include PHPDoc `@see` tag referencing main class

## Architecture Principles

### Database
- **No database components** - No migrations, models, or factories needed
- Database will be added in future if required
- Focus on request/response handling and Inertia integration

### Static Analysis
- **PHPStan Level 5** enforced
- Octane compatibility checking enabled
- Model property checking enabled (when models are added)
- Baseline file: `phpstan-baseline.neon`

### Code Organization
- **Performance**: Minimize I/O, use caching where appropriate
- **Simplicity**: Avoid over-engineering, prefer Laravel's built-in solutions
- **Maintainability**: Clear separation of concerns
- **Type Safety**: Leverage PHP 8.3+ features (union types, readonly properties, etc.)

## Project Structure

```
/src                    - Main source code
  /Facades             - Facade classes
  InertiaLookup.php    - Main package class
  InertiaLookupServiceProvider.php - Package service provider

/tests                  - Pest test files
  /Feature             - Feature tests
  /Unit                - Unit tests
  Pest.php             - Pest configuration
  ArchTest.php         - Architecture tests

/config                 - Configuration files
workbench/             - Test application for development
```

## Version Support

- **PHP**: 8.3, 8.4 (prefer latest)
- **Laravel**: 11.*, 12.* (prefer latest)
- **Orchestra Testbench**: 9.* for L11, 10.* for L12
- **Dependencies**: Prefer stable versions, use `prefer-stable` composer option

## Development Workflow

1. Write code following Laravel conventions
2. Run `composer format` before committing
3. Run `vendor/bin/pest` to ensure tests pass
4. Run `composer analyse` to check for static analysis issues
5. Focus on performance and simplicity
6. No database components unless explicitly needed

## GitHub Actions

- **run-tests.yml**: Tests on Ubuntu/Windows, PHP 8.3/8.4, Laravel 11/12
- **phpstan.yml**: Static analysis on PHP 8.4
- **fix-php-code-style-issues.yml**: Auto-format code with Laravel Pint

All workflows must pass before merging.
