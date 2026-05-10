<?php

// Unit tests for validation rules
// [SCRUM-62] Unit Tests for Validation Rules

namespace QuickPOS\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ValidationRulesTest extends TestCase
{
    #[DataProvider('nameValidationProvider')]
    public function testNameValidation(?string $name, bool $shouldPass): void
    {
        $isValid = !empty(trim($name ?? ''));
        $this->assertEquals($shouldPass, $isValid, "Name: '" . ($name ?? 'null') . "' should " . ($shouldPass ? 'pass' : 'fail'));
    }

    #[DataProvider('messageValidationProvider')]
    public function testMessageValidation(?string $message, bool $shouldPass): void
    {
        $isValid = !empty(trim($message ?? ''));
        $this->assertEquals($shouldPass, $isValid, "Message validation failed");
    }

    public static function nameValidationProvider(): array
    {
        return [
            'normal name'     => ['John Doe', true],
            'single character'=> ['A', true],
            'with spaces'     => ['  John Doe  ', true],
            'empty string'    => ['', false],
            'only spaces'     => ['   ', false],
            'null value'      => [null, false],
            'very long name'  => [str_repeat('A', 1000), true],
        ];
    }

    public static function messageValidationProvider(): array
    {
        return [
            'normal message'   => ['Hello, I want to buy this POS', true],
            'short message'    => ['Hi', true],
            'empty message'    => ['', false],
            'only spaces'      => ['     ', false],
            'null message'     => [null, false],
            'very long message'=> [str_repeat('Hello ', 500), true],
        ];
    }

    public function testHtmlSpecialCharsEscaping(): void
    {
        $input = '<script>alert("xss")</script>';
        $expected = '&lt;script&gt;alert(&quot;xss&quot;)&lt;/script&gt;';
        $output = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        $this->assertEquals($expected, $output);
    }
}
