<?php

// [SCRUM-57][SCRUM-58] Page Load Tests

namespace QuickPOS\Tests;

use PHPUnit\Framework\TestCase;

class PageLoadTest extends TestCase
{
    private string $baseUrl;        // Added :string type
    // SCRUM-57: Test index.php loads without errors
    public function testIndexPageLoadsWithoutErrors()
    {
        $url = 'http://localhost/quickpos-v2/quickpos-landing-page/index.php';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $this->assertEquals(200, $statusCode);
        $this->assertNotEmpty($response);
    }

    // SCRUM-58: Test thankyou.html loads without errors
    public function testThankYouPageLoadsWithoutErrors()
    {
        $url = 'http://localhost/quickpos-v2/quickpos-landing-page/thankyou.html';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $this->assertEquals(200, $statusCode);
        $this->assertNotEmpty($response);
    }
}
