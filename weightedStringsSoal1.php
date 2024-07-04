<?php
function weightedStrings($input, $queries) {
    $weights = [];
    $length = strlen($input);
    for ($i = 0; $i < $length; $i++) {
        $weight = ord($input[$i]) - ord('a') + 1;
        $currentWeight = $weight;
        $weights[] = $currentWeight;
        for ($j = $i + 1; $j < $length && $input[$j] == $input[$i]; $j++) {
            $currentWeight += $weight;
            $weights[] = $currentWeight;
            $i = $j;
        }
    }
    $result = [];
    foreach ($queries as $query) {
        $result[] = in_array($query, $weights) ? "Yes" : "No";
    }
    return $result;
}

// Test the function
$input = "deeffggg";
$queries = [5, 10, 21, 15];
echo "input : ".$input."\n";
echo "queries :".json_encode($queries)."\n";

echo "Result:".json_encode(weightedStrings($input, $queries))."\n";
?>