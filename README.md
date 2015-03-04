# Longest Increasing Subsequence

Given an array of integers, it can find the longest increasing subsequence using the `O(n log n)` algorithm.

## Example

Run the example with:

````
php lis.php
````

Output:

````
----- Longest Increasing Subsequence -----

Sequence:  1, 5, 2
LIS:       1, 2

Sequence:  1, 2, 3, 4, 5, 6, 7, 8, 9, 10
LIS:       1, 2, 3, 4, 5, 6, 7, 8, 9, 10

Sequence:  2, 8, 3, 4, 10, 6
LIS:       2, 3, 4, 6

Sequence:  0, 8, 4, 12, 2, 10, 6, 14, 1, 9, 5, 13, 3, 11, 7, 15
LIS:       0, 2, 6, 9, 11, 15

Sequence:  10, 22, 9, 33, 21, 50, 41, 60, 3, 40, 65, 30, 70, 71, 20, 40
LIS:       10, 22, 33, 41, 60, 65, 70, 71
````

## Tests

Unit tests is found in the `tests` folder.
Run the tests with:

````
phpunit
````
