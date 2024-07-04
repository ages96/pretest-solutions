<?php
function isBalanced($input) {
    $stack = [];
    $pairs = ['(' => ')', '{' => '}', '[' => ']'];
    foreach (str_split($input) as $char) {
        if (isset($pairs[$char])) {
            $stack[] = $char;
        } else {
            if (empty($stack) || $pairs[array_pop($stack)] !== $char) {
                return "NO";
            }
        }
    }
    return empty($stack) ? "YES" : "NO";
}

// Test the function
$inputs = ["{[(())]}", "{[(])}", "[{()}]"];

echo "inputs : ".json_encode($inputs)."\n";

echo "Result : \n";

foreach ($inputs as $input) {
    echo isBalanced($input) . "\n";
}
?>