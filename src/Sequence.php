<?php namespace LIS;

class Sequence
{
    /**
     * @var array
     */
    protected $array;

    /**
     * @var int
     */
    protected $length;

    /**
     * @var array
     */
    protected $tailIndexes;

    /**
     * @var array
     */
    protected $prevIndexes;

    /**
     * @var int
     */
    protected $currentLength;

    public function __construct(array $array)
    {
        $this->array  = $array;
        $this->length = count($array);
    }

    /**
     * @return array
     */
    public function findLIS()
    {
        if (empty($this->array)) {
            return [];
        }

        $this->resetVariables();

        for ($i = 1; $i < $this->length; $i++) {
            if ($this->isSmallest($i)) {
                $this->newSmallestValue($i);
            } else {
                if ($this->isBiggest($i)) {
                    $this->extendLargestSubsequence($i);
                } else {
                    $this->potentialCandidate($i);
                }
            }
        }

        return $this->generateLisArray();
    }

    /**
     * Reset variables to defaults for a new calculation.
     */
    protected function resetVariables()
    {
        $this->tailIndexes = [];
        $this->prevIndexes = [];

        $this->tailIndexes[0] = 0;
        $this->prevIndexes[0] = -1;

        $this->currentLength = 1;
    }

    /**
     * @param int $i
     * @return bool
     */
    protected function isSmallest($i)
    {
        $currentSmallest = $this->array[$this->tailIndexes[0]];

        return $this->array[$i] < $currentSmallest;
    }

    /**
     * @param int $i
     */
    protected function newSmallestValue($i)
    {
        $this->tailIndexes[0] = $i;
    }

    /**
     * @param int $i
     * @return bool
     */
    protected function isBiggest($i)
    {
        $currentBiggest = $this->array[$this->tailIndexes[$this->currentLength - 1]];

        return $this->array[$i] > $currentBiggest;
    }

    /**
     * @param int $i
     */
    protected function extendLargestSubsequence($i)
    {
        $this->prevIndexes[$i]                   = $this->tailIndexes[$this->currentLength - 1];
        $this->tailIndexes[$this->currentLength] = $i;
        $this->currentLength++;
    }

    /**
     * @param int $i
     */
    protected function potentialCandidate($i)
    {
        $pos = $this->getCeilIndex(-1, $this->currentLength - 1, $this->array[$i]);

        $this->prevIndexes[$i]   = $this->tailIndexes[$pos - 1];
        $this->tailIndexes[$pos] = $i;
    }

    /**
     * @param int $len
     * @param int $pos
     * @param int $key
     * @return float|int
     */
    public function getCeilIndex($len, $pos, $key)
    {
        while ($pos - $len > 1) {
            $mid = $len + ($pos - $len) / 2;
            if ($this->array[$this->tailIndexes[$mid]] >= $key) {
                $pos = $mid;
            } else {
                $len = $mid;
            }
        }

        return $pos;
    }

    /**
     * Generate the longest increasing subsequence as an array.
     *
     * @return array
     */
    protected function generateLisArray()
    {
        $result = [];
        for ($i = $this->tailIndexes[$this->currentLength - 1]; $i >= 0; $i = $this->prevIndexes[$i]) {
            array_unshift($result, $this->array[$i]);
        }

        return $result;
    }
}
