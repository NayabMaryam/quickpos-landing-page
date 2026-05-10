<?php

// [SCRUM-63] Test runner with HTML report generation

require_once __DIR__ . '/vendor/autoload.php';

use QuickPOS\Tests\TestReport;

// Windows vs Linux compatible command
$phpunit = PHP_OS_FAMILY === 'Windows'
    ? 'vendor\bin\phpunit'
    : './vendor/bin/phpunit';

$command = $phpunit . ' tests/ --testdox --log-junit test-results.xml';
exec($command . ' 2>&1', $output, $returnCode);

echo implode("\n", $output) . "\n";

$results = [];

if (file_exists(__DIR__ . '/test-results.xml')) {
    $xml = simplexml_load_file(__DIR__ . '/test-results.xml');
    foreach ($xml->xpath('//testcase') as $testcase) {
        $results[] = [
            'name'   => (string) $testcase['classname'] . '::' . (string) $testcase['name'],
            'passed' => !isset($testcase->failure) && !isset($testcase->error),
            'time'   => round((float) $testcase['time'] * 1000, 2),
        ];
    }
}

TestReport::generate($results);

echo "\n📊 View report: open test-report.html in your browser\n";

exit($returnCode);