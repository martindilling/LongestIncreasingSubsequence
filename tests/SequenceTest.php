<?php namespace LIS\Tests;

use LIS\Sequence;

class SequenceTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function can_take_empty()
    {
        $sequence = new Sequence([]);
        $lis = $sequence->findLIS();

        $this->assertEquals([], $lis);
    }

    /** @test */
    public function can_take_single_value()
    {
        $sequence = new Sequence([2]);
        $lis = $sequence->findLIS();

        $this->assertEquals([2], $lis);
    }

    /** @test */
    public function in_order()
    {
        $sequence = new Sequence([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $lis = $sequence->findLIS();

        $this->assertEquals([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], $lis);
    }

    /** @test */
    public function test_1()
    {
        $sequence = new Sequence([1, 5, 2]);
        $lis = $sequence->findLIS();

        $this->assertEquals([1, 2], $lis);
    }

    /** @test */
    public function test_2()
    {
        $sequence = new Sequence([2, 8, 3, 4, 10, 6]);
        $lis = $sequence->findLIS();

        $this->assertEquals([2, 3, 4, 6], $lis);
    }

    /** @test */
    public function test_3()
    {
        $sequence = new Sequence([0, 8, 4, 12, 2, 10, 6, 14, 1, 9, 5, 13, 3, 11, 7, 15]);
        $lis = $sequence->findLIS();

        $this->assertEquals([0, 2, 6, 9, 11, 15], $lis);
    }

    /** @test */
    public function test_4()
    {
        $sequence = new Sequence([10, 22, 9, 33, 21, 50, 41, 60, 3, 40, 65, 30, 70, 71, 20, 40]);
        $lis = $sequence->findLIS();

        $this->assertEquals([10, 22, 33, 41, 60, 65, 70, 71], $lis);
    }

}
