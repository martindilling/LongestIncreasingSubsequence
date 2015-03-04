<?php namespace LIS;

class Sequence
{
    protected $array = [];
    protected $length = [];

    public function __construct(array $array)
    {
        $this->array  = $array;
        $this->length = count($array);
    }

    public function findLIS()
    {
        if (empty($this->array)) {
            return [];
        }

        $tailIndexes = [];
        $prevIndexes = [];

        $tailIndexes[0] = 0;
        $prevIndexes[0] = -1;
        $currentLength  = 1;

        for ($i = 1; $i < $this->length; $i++) {
            if ($this->array[$i] < $this->array[$tailIndexes[0]]) {
                $tailIndexes[0] = $i;
            } else {
                if ($this->array[$i] > $this->array[$tailIndexes[$currentLength - 1]]) {
                    $prevIndexes[$i]             = $tailIndexes[$currentLength - 1];
                    $tailIndexes[$currentLength] = $i;
                    $currentLength++;
                } else {
                    $pos = $this->getCeilIndex($this->array, $tailIndexes, -1, $currentLength - 1, $this->array[$i]);

                    $prevIndexes[$i]   = $tailIndexes[$pos - 1];
                    $tailIndexes[$pos] = $i;
                }
            }
        }

        $result = [];
        for ($i = $tailIndexes[$currentLength - 1]; $i >= 0; $i = $prevIndexes[$i]) {
            array_unshift($result, $this->array[$i]);
        }

        return $result;
    }

    public function getCeilIndex($array, $tailIndices, $len, $r, $key)
    {
        while ($r - $len > 1) {
            $mid = $len + ($r - $len) / 2;
            if ($array[$tailIndices[$mid]] >= $key) {
                $r = $mid;
            } else {
                $len = $mid;
            }
        }

        return $r;
    }
}
