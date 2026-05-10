<?php

// [SCRUM-63] Test Report Generator

namespace QuickPOS\Tests;

class TestReport
{
    public static function generate(array $results): void
    {
        $total    = count($results);
        $passed   = count(array_filter($results, function ($r) {
            return $r['passed'];
        }));
        $failed   = $total - $passed;
        $passRate = $total > 0 ? round(($passed / $total) * 100, 2) : 0;
        $env      = getenv('CI') ? 'GitHub Actions' : 'Local';

        $rows = '';
        foreach ($results as $result) {
            $status = $result['passed'] ? '✅ PASS' : '❌ FAIL';
            $color  = $result['passed'] ? 'pass' : 'fail';
            $rows  .= "<tr>
                <td>{$result['name']}</td>
                <td class='{$color}'>{$status}</td>
                <td>{$result['time']}</td>
            </tr>";
        }

        $html = '<!DOCTYPE html>
<html>
<head>
    <title>QuickPOS Test Report</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #2c1a0e; border-bottom: 2px solid #e2d9ce; padding-bottom: 10px; }
        .summary { background-color: #f4f1eb; padding: 15px; border-radius: 8px; margin: 20px 0; }
        .pass { color: green; }
        .fail { color: red; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #2c1a0e; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .stats { display: inline-block; margin: 0 20px; padding: 10px; }
        .stats-number { font-size: 24px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>☕ QuickPOS Test Report</h1>
        <div class="summary">
            <strong>Generated:</strong> ' . date('Y-m-d H:i:s') . '<br>
            <strong>PHP Version:</strong> ' . phpversion() . '<br>
            <strong>Environment:</strong> ' . $env . '
        </div>
        <div class="summary">
            <div class="stats"><div class="stats-number">' . $total . '</div><div>Total Tests</div></div>
            <div class="stats"><div class="stats-number" style="color:green">' . $passed . '</div><div>Passed</div></div>
            <div class="stats"><div class="stats-number" style="color:red">' . $failed . '</div><div>Failed</div></div>
            <div class="stats"><div class="stats-number">' . $passRate . '%</div><div>Pass Rate</div></div>
        </div>
        <table>
            <thead>
                <tr><th>Test Name</th><th>Status</th><th>Time (ms)</th></tr>
            </thead>
            <tbody>' . $rows . '</tbody>
        </table>
    </div>
</body>
</html>';

        file_put_contents(__DIR__ . '/../test-report.html', $html);
        echo "✅ Test report generated: test-report.html\n";
    }
}
