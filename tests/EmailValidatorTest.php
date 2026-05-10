<?php
// Unit Tests
// [SCRUM-60] Unit Tests for Email Validation

namespace QuickPOS\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EmailValidatorTest extends TestCase
{
    #[DataProvider('validEmailProvider')]
    public function testValidEmailsAreAccepted(string $email): void
    {
        $isValid = filter_var($email, FILTER_VALIDATE_EMAIL);
        $this->assertTrue((bool)$isValid, "Email '$email' should be valid");
    }

    #[DataProvider('invalidEmailProvider')]
    public function testInvalidEmailsAreRejected(string $email): void
    {
        $isValid = filter_var($email, FILTER_VALIDATE_EMAIL);
        $this->assertFalse((bool)$isValid, "Email '$email' should be invalid");
    }

    public static function validEmailProvider(): array
    {
        return [
            'simple email'    => ['test@example.com'],
            'with plus sign'  => ['test+spam@gmail.com'],
            'with dots'       => ['john.doe@company.co.uk'],
            'with numbers'    => ['user123@domain123.com'],
            'single letter'   => ['a@b.com'],
        ];
    }

    public static function invalidEmailProvider(): array
    {
        return [
            'no @ symbol'       => ['testexample.com'],
            'missing domain'    => ['test@'],
            'missing local part'=> ['@example.com'],
            'just text'         => ['abc'],
            'space in email'    => ['test @example.com'],
            'double dots'       => ['test..test@example.com'],
            'no dot in domain'  => ['test@examplecom'],
            'special chars only'=> ['!@#$%^&*()'],
            'empty string'      => [''],
        ];
    }

    public function testNullIsRejected(): void
    {
        $isValid = filter_var(null, FILTER_VALIDATE_EMAIL);
        $this->assertFalse((bool)$isValid);
    }
}