<?php

require_once('vendor/autoload.php');

echo PHP_EOL;
echo '----- Longest Increasing Subsequence -----' . PHP_EOL;
echo PHP_EOL;

$arrays = [
    [1, 5, 2],
    [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    [2, 8, 3, 4, 10, 6],
    [0, 8, 4, 12, 2, 10, 6, 14, 1, 9, 5, 13, 3, 11, 7, 15],
    [10, 22, 9, 33, 21, 50, 41, 60, 3, 40, 65, 30, 70, 71, 20, 40]
];

foreach ($arrays as $array) {
    $sequence = new LIS\Sequence($array);
    echo 'Sequence:  ' . implode(', ', $array) . PHP_EOL;
    echo 'LIS:       ' . implode(', ', $sequence->findLIS()) . PHP_EOL;
    echo PHP_EOL;
}

