<?php

// Penyelesaian Soal: Balanced Bracket (Soal 1 dan 2)
// Soal 1 dan 2 (menggunakan fungsi yang sama)

function isBalanced($string) {
    $stack = [];
    $pairs = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];
    
    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];
        
        if (in_array($char, ['(', '{', '['])) {
            array_push($stack, $char);
        } elseif (in_array($char, [')', '}', ']'])) {
            if (empty($stack) || array_pop($stack) != $pairs[$char]) {
                return "NO";
            }
        }
    }
    
    return empty($stack) ? "YES" : "NO";
}

// Contoh penggunaan
$strings = ["([{}])", "([{]})", "({[]})", "{[(())]}", "{[(])}", "[{()}]"];
foreach ($strings as $string) {
    echo isBalanced($string) . "\n";
}
?>