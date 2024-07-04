<?php
function highestPalindrome($s, $k) {
    // Closure function to handle recursive palindrome creation
    $helper = function($s, $k, $left, $right) use (&$helper) {
        if ($k < 0) {
            return "-1";
        }
        if ($left >= $right) {
            return $s;
        }
        if ($s[$left] === $s[$right]) {
            return $helper($s, $k, $left + 1, $right - 1);
        }
        $option1 = $helper(substr_replace($s, $s[$right], $left, 1), $k - 1, $left + 1, $right - 1);
        $option2 = $helper(substr_replace($s, $s[$left], $right, 1), $k - 1, $left + 1, $right - 1);
        
        if ($option1 === "-1" && $option2 === "-1") {
            return "-1";
        }
        return strcmp($option1, $option2) > 0 ? $option1 : $option2;
    };

    return $helper($s, $k, 0, strlen($s) - 1);
}

// Test the function

echo "Input: 12321, k = 1\n";
echo "Result: " . highestPalindrome("12321", 1) . "\n";

echo "Input: 45654, k = 2\n";
echo "Result: " . highestPalindrome("45654", 2) . "\n";
?>
