<?php

// Integration + validation testing
// [SCRUM-54][SCRUM-55][SCRUM-56] Contact Form Tests

namespace QuickPOS\Tests;

use PHPUnit\Framework\TestCase;

class ContactFormTest extends TestCase
{
    private string $baseUrl;
    private ?\PDO $pdo = null;

    protected function setUp(): void
    {
        $this->baseUrl = getenv('APP_BASE_URL') ?: 'http://localhost/quickpos-v2/quickpos-landing-page';

        $host   = getenv('DB_HOST') ?: 'localhost';
        $dbname = getenv('DB_NAME') ?: 'quickpos_db';
        $user   = getenv('DB_USER') ?: 'root';
        $pass   = getenv('DB_PASS') ?: 'root';

        try {
            $this->pdo = new \PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8",
                $user,
                $pass
            );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "\nDatabase connection failed: " . $e->getMessage() . "\n";
            $this->markTestSkipped('Database not available: ' . $e->getMessage());
        }
    }

    // Clean up test data after each test
    protected function tearDown(): void
    {
        if ($this->pdo) {
            // Delete test records with @example.com or test_ emails
            $this->pdo->exec("DELETE FROM contacts WHERE email LIKE '%@example.com' OR email LIKE 'test_%@%'");
        }
    }

    // SCRUM-54: Test empty fields validation
    public function testEmptyFieldsShowValidationErrors()
    {
        $data = [
            'name' => '',
            'email' => '',
            'message' => ''
        ];

        $response = $this->simulatePostRequest('/php/contact.php', $data);

        $this->assertStringContainsString('index.php?error=', $response['location']);
        $this->assertStringContainsString('Name+is+required', $response['location']);
        $this->assertStringContainsString('Email+is+required', $response['location']);
        $this->assertStringContainsString('Message+is+required', $response['location']);
    }

    // SCRUM-55: Test invalid email format
    public function testInvalidEmailShowsValidationError()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'not-an-email',
            'message' => 'This is a test message'
        ];

        $response = $this->simulatePostRequest('/php/contact.php', $data);

        $this->assertStringContainsString('index.php?error=', $response['location']);
        $this->assertStringContainsString('Invalid+email', $response['location']);
    }

    // SCRUM-56: Test valid form submission saves to database and redirects
    public function testValidFormSubmissionSavesToDatabaseAndRedirects()
    {
        $uniqueEmail = 'test_' . time() . '_' . rand(1000, 9999) . '@example.com';

        $data = [
            'name' => 'Nayab',
            'email' => $uniqueEmail,
            'cafe' => 'The Daily Grind',
            'message' => 'I want to purchase QuickPOS'
        ];

        $response = $this->simulatePostRequest('/php/contact.php', $data);

        $this->assertStringContainsString('thankyou.html', $response['location']);

        // Verify database contains record
        $stmt = $this->pdo->prepare("SELECT * FROM contacts WHERE email = ?");
        $stmt->execute([$uniqueEmail]);
        $record = $stmt->fetch(\PDO::FETCH_ASSOC);

        $this->assertNotEmpty($record, 'Database should contain the submitted record');
        $this->assertEquals('Nayab', $record['name']);
        $this->assertEquals($uniqueEmail, $record['email']);
        $this->assertEquals('The Daily Grind', $record['cafe_name']);
        $this->assertEquals('I want to purchase QuickPOS', $record['message']);
    }

    // Helper method to simulate POST request
    private function simulatePostRequest($endpoint, $postData)
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

        if (is_resource($ch)) {
            curl_close($ch);
        }

        return ['location' => $location];
    }
}
