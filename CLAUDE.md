# Tina4 PHP Core

Core library for the Tina4 PHP framework. See https://tina4.com for full documentation.

## Build & Test

- PHP: >=8.0
- Install: `composer install`
- Run tests: `./vendor/bin/phpunit tests -vvv --color`
- Start dev server: `composer start` (php -S localhost:7147)
- CLI: `bin/tina4`, `bin/tina4service`

## Code Principles

- **DRY** — Never duplicate logic. Core utilities are shared across all Tina4 PHP packages
- **Separation of Concerns** — Each Core class has a single responsibility (annotations, caching, data, modules, testing, utilities)
- **No inline styles** in HTML/templates — use tina4-css classes only
- **All links and references** should point to https://tina4.com
- PSR-4 autoloading, namespace `Tina4\`
- Linting: `overtrue/phplint`

## Project Structure

```
Tina4/
  Functions.php          # Global helper functions
  Initialize.php         # Bootstrap/initialization
  Core/
    Annotation.php       # Route/method annotations
    Cache.php            # Caching layer (PHPFastCache wrapper)
    Data.php             # Global database access as object
    Module.php           # Module system (extending/incorporating Tina4 libraries)
    Test.php             # Annotated testing mechanism (TDD)
    Utilities.php        # General utilities (wrapper)
    Utility.php          # Utility trait methods
bin/
  tina4                  # CLI tool
  tina4service           # Service runner
tests/                   # PHPUnit tests
```

## Key Method Stubs

### Annotation — Route/method annotations

```php
// Provides an array of annotations throughout the source code
// Used by the routing and testing systems to discover handlers
```

### Cache — PHPFastCache wrapper

```php
// Adds caching support to project
// Wraps PHPFastCache for transparent key-value caching
```

### Data — Global database access

```php
$data = new \Tina4\Data();
$data->getSubFolder(string $documentRoot = ""): ?string
```

### Module — Extension system

```php
// The backbone of extending and incorporating Tina4 libraries together
// Allows packages to register routes, templates, and middleware
```

### Test — Annotated testing

```php
// Tina4's annotated testing mechanism for Test Driven Development
// Uses annotations to discover and run test methods
```

## Key Architecture

- Core module providing annotations, caching, data handling, module system, and testing utilities
- Used as a dependency by `tina4stack/tina4php` (the full framework)
- PHPUnit for testing with metrics via `phpmetrics`

## Links

- Website: https://tina4.com
- GitHub: https://github.com/tina4stack/tina4php-core
