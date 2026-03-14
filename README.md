# tina4php-core

Core functionality for the Tina4 PHP framework, providing annotations, caching, data access, module management, testing, and utility helpers.

## Installation

```bash
composer require tina4stack/tina4php-core
```

## Requirements

- PHP >= 8.1

## Usage

### Registering a Module

```php
use Tina4\Module;

Module::addModule("MyModule", "1.0.0", "MyNamespace");
```

### Using the Cache

```php
use Tina4\Cache;

$cache = new Cache();
$cache->set("user_123", ["name" => "Alice"], 300);
$value = $cache->get("user_123");
```

### Retrieving Annotations

```php
use Tina4\Annotation;

$annotation = new Annotation();
$routes = $annotation->get("api");
```

## Testing

```bash
composer test
```

## License

MIT - see [LICENSE](LICENSE)

---

## Our Sponsors

**Sponsored with 🩵 by Code Infinity**

[<img src="https://codeinfinity.co.za/wp-content/uploads/2025/09/c8e-logo-github.png" alt="Code Infinity" width="100">](https://codeinfinity.co.za/about-open-source-policy?utm_source=github&utm_medium=website&utm_campaign=opensource_campaign&utm_id=opensource)

*Supporting open source communities <span style="color: #1DC7DE;">•</span> Innovate <span style="color: #1DC7DE;">•</span> Code <span style="color: #1DC7DE;">•</span> Empower*
