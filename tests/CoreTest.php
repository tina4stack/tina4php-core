<?php

/**
 * Unit tests for tina4php-core utility classes.
 * These tests run standalone without a database or web server.
 */

use PHPUnit\Framework\TestCase;

class CoreTest extends TestCase
{
    private Tina4\Utilities $utilities;

    protected function setUp(): void
    {
        $this->utilities = new Tina4\Utilities();
    }

    // ── Cache (no backend) ───────────────────────────────────────────

    public function testCacheSetReturnsFalseWithoutBackend(): void
    {
        // When no global $cache is configured, set() should return false
        $cache = new Tina4\Cache();
        $this->assertFalse($cache->set('key', 'value'));
    }

    public function testCacheGetReturnsNullWithoutBackend(): void
    {
        // When no global $cache is configured, get() should return null
        $cache = new Tina4\Cache();
        $this->assertNull($cache->get('key'));
    }

    // ── getMimeType (static) ─────────────────────────────────────────

    public function testGetMimeTypeReturnsCorrectTypes(): void
    {
        $cases = [
            'photo.png'    => 'image/png',
            'photo.jpg'    => 'image/jpg',
            'photo.jpeg'   => 'image/jpeg',
            'photo.webp'   => 'image/webp',
            'icon.ico'     => 'image/ico',
            'icon.svg'     => 'image/svg+xml',
            'style.css'    => 'text/css',
            'doc.pdf'      => 'application/pdf',
            'app.js'       => 'text/javascript',
            'clip.mp4'     => 'video/mp4',
            'sound.ogg'    => 'audio/ogg',
            'page.html'    => 'text/html',
            'unknown.xyz'  => 'text/html',
        ];

        foreach ($cases as $file => $expected) {
            $this->assertSame(
                $expected,
                Tina4\Utilities::getMimeType($file),
                "MIME type mismatch for {$file}"
            );
        }
    }

    // ── camelCase ────────────────────────────────────────────────────

    public function testCamelCaseConvertsUnderscoreNames(): void
    {
        $this->assertSame('firstName', $this->utilities->camelCase('first_name'));
        $this->assertSame('myLongVariable', $this->utilities->camelCase('my_long_variable'));
    }

    public function testCamelCaseLowercasesFirstLetter(): void
    {
        // A name without underscores just gets its first letter lowered
        $this->assertSame('helloWorld', $this->utilities->camelCase('HelloWorld'));
        $this->assertSame('single', $this->utilities->camelCase('Single'));
    }

    // ── isBinary ─────────────────────────────────────────────────────

    public function testIsBinaryReturnsFalseForPlainValues(): void
    {
        $this->assertFalse($this->utilities->isBinary(null));
        $this->assertFalse($this->utilities->isBinary(''));
        $this->assertFalse($this->utilities->isBinary('hello world'));
        $this->assertFalse($this->utilities->isBinary('12345'));
    }

    // ── isDate ───────────────────────────────────────────────────────

    public function testIsDateValidatesDateStrings(): void
    {
        $this->assertTrue($this->utilities->isDate('2024-01-15', 'Y-m-d'));
        $this->assertFalse($this->utilities->isDate('not-a-date', 'Y-m-d'));
        $this->assertFalse($this->utilities->isDate(null, 'Y-m-d'));
    }

    // ── clean ────────────────────────────────────────────────────────

    public function testCleanRemovesSpecialCharacters(): void
    {
        // Spaces become hyphens, then non-alphanumeric (except hyphens) are removed
        $this->assertSame('hello-world', $this->utilities->clean('hello world'));
        $this->assertSame('test-123', $this->utilities->clean('test 123'));
        $this->assertSame('no special', $this->utilities->clean('no!special'));
    }
}
