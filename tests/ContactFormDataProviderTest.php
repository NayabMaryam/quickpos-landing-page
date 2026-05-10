<?php
// Data-Driven Validation Tests
// [SCRUM-61] Data-Driven Contact Form Validation Tests

namespace QuickPOS\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ContactFormDataProviderTest extends TestCase
{
    private string $baseUrl;

    protected function setUp(): void
    {
        $this->baseUrl = getenv('APP_BASE_URL') ?: 'http://localhost/quickpos-v2/quickpos-landing-page';
    }

    #[DataProvider('formSubmissionDataProvider')]
    public function testFormValidationWithMultipleInputs(
        string $name,
        string $email,
        string $message,
        string $expectedContains,
        bool $shouldRedirect
    ): void {
        $data = [
            'name'    => $name,
            'email'   => $email,
            'message' => $message
        ];

        $response = $this->simulatePostRequest('/php/contact.php', $data);

        if ($shouldRedirect) {
            $this->assertStringContainsString('thankyou.html', $response['location']);
        } else {
            $this->assertStringContainsString('index.php?error=', $response['location']);
            $this->assertStringContainsString($expectedContains, $response['location']);
        }
    }

    public static function formSubmissionDataProvider(): array
    {
        return [
            'empty name' => [
                'name'             => '',
                'email'            => 'test@example.com',
                'message'          => 'Hello',
                'expectedContains' => 'Name+is+required',
                'shouldRedirect'   => false
            ],
            'empty email' => [
                'name'             => 'Test User',
                'email'            => '',
                'message'          => 'Hello',
                'expectedContains' => 'Email+is+required',
                'shouldRedirect'   => false
            ],
            'empty message' => [
                'name'             => 'Test User',
                'email'            => 'test@example.com',
                'message'          => '',
                'expectedContains' => 'Message+is+required',
                'shouldRedirect'   => false
            ],
            'all empty' => [
                'name'             => '',
                'email'            => '',
                'message'          => '',
                'expectedContains' => 'Name+is+required',
                'shouldRedirect'   => false
            ],
            'invalid email format' => [
                'name'             => 'Test User',
                'email'            => 'not-an-email',
                'message'          => 'Hello',
                'expectedContains' => 'Invalid+email',
                'shouldRedirect'   => false
            ],
            'email missing dot' => [
                'name'             => 'Test User',
                'email'            => 'test@examplecom',
                'message'          => 'Hello',
                'expectedContains' => 'Invalid+email',
                'shouldRedirect'   => false
            ],
        ];
    }

    public function testValidFormSubmission(): void
    {
        $uniqueEmail = 'test_' . time() . '_' . rand(1000, 9999) . '@example.com';

        $data = [
            'name'    => 'Test User',
            'email'   => $uniqueEmail,
            'cafe'    => 'Test Cafe',
            'message' => 'This is a valid message'
        ];

        $response = $this->simulatePostRequest('/php/contact.php', $data);
        $this->assertStringContainsString('thankyou.html', $response['location']);
    }

    private function simulatePostRequest(string $endpoint, array $postData): array
    {
        $url = $this->baseUrl . $endpoint;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

        $response = curl_exec($ch);

        $location = '';
        if (preg_match('/Location: (.*?)\r?\n/', $response, $matches)) {
            $location = trim($matches[1]);
        }

        curl_close($ch);

        return ['location' => $location];
    }
}