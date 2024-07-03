<?php

// Penyelesaian Soal: Weighted Strings (Soal 1 dan 2)

function weightedStrings($string, $queries) {
    // Membuat array untuk menyimpan bobot substring yang unik
    $weights = [];
    
    // Hitung bobot substring yang unik
    $length = strlen($string);
    for ($i = 0; $i < $length; $i++) {
        $weight = 0;
        for ($j = $i; $j < $length; $j++) {
            $weight += ord($string[$j]) - ord('a') + 1;
            $weights[$weight] = true;
        }
    }
    
    // Cek status dari setiap query
    $results = [];
    foreach ($queries as $query) {
        if (isset($weights[$query])) {
            $results[] = "Yes";
        } else {
            $results[] = "No";
        }
    }
    
    return $results;
}

echo "Contoh penggunaan soal 1\n";
$string = "deeffggg";
$queries = [5, 10, 21, 15];
print_r(weightedStrings($string, $queries));

echo "Contoh penggunaan soal 2\n";
$string = "aaabbccccd";
$queries = [3, 6, 12, 24];
print_r(weightedStrings($string, $queries));
?>