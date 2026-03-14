<?php

/**
 * Test bootstrap for tina4php-core.
 */

if (!isset($_SERVER['DOCUMENT_ROOT'])) {
    $_SERVER['DOCUMENT_ROOT'] = dirname(__DIR__);
}

require_once dirname(__DIR__) . '/vendor/autoload.php';
