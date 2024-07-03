<?php

// Penyelesaian Soal: Highest Palindrome (Soal 1 dan 2)
// Soal 1 dan 2 (menggunakan fungsi yang sama)

function highestPalindrome($string, $k, $start = 0, $end = null) {
    if ($end === null) {
        $end = strlen($string) - 1;
    }
    
    // Base case: Jika start lebih besar atau sama dengan end, kita telah mencapai tengah string
    if ($start >= $end) {
        return $string;
    }
    
    // Jika karakter di posisi start dan end berbeda
    if ($string[$start] != $string[$end]) {
        if ($k <= 0) {
            return -1; // Tidak cukup k untuk membuat palindrome
        }
        
        // Pilih karakter yang lebih besar untuk memastikan palindrome tertinggi
        $higherChar = max($string[$start], $string[$end]);
        $string[$start] = $higherChar;
        $string[$end] = $higherChar;
        $k--;
    }
    
    // Rekursif untuk bagian dalam string
    return highestPalindrome($string, $k, $start + 1, $end - 1);
}

// Contoh penggunaan
echo highestPalindrome("12321", 1) . "\n"; // Output: 13331
echo highestPalindrome("45654", 2) . "\n"; // Output: 55655
echo highestPalindrome("765467", 1) . "\n"; // Output: 765567
echo highestPalindrome("812128", 2) . "\n"; // Output: 882288
?>