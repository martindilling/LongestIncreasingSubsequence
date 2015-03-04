<?php namespace LIS\Tests;

use LIS\Sequence;

class SequenceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $array
     * @param array $expected
     */
    protected function assertLIS($array, $expected)
    {
        $sequence = new Sequence($array);
        $lis      = $sequence->findLIS();

        $this->assertEquals($expected, $lis);
    }


    /** @test */
    public function can_take_empty()
    {
        $array = [];
        $lis   = [];

        $this->assertLIS($array, $lis);
    }

    /** @test */
    public function can_take_single_value()
    {
        $array = [2];
        $lis   = [2];

        $this->assertLIS($array, $lis);
    }

    /** @test */
    public function in_order()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $lis   = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        $this->assertLIS($array, $lis);
    }

    /** @test */
    public function test_1()
    {
        $array = [1, 5, 2];
        $lis   = [1, 2];

        $this->assertLIS($array, $lis);
    }

    /** @test */
    public function test_2()
    {
        $array = [2, 8, 3, 4, 10, 6];
        $lis   = [2, 3, 4, 6];

        $this->assertLIS($array, $lis);
    }

    /** @test */
    public function test_3()
    {
        $array = [0, 8, 4, 12, 2, 10, 6, 14, 1, 9, 5, 13, 3, 11, 7, 15];
        $lis   = [0, 2, 6, 9, 11, 15];

        $this->assertLIS($array, $lis);
    }

    /** @test */
    public function test_4()
    {
        $array = [10, 22, 9, 33, 21, 50, 41, 60, 3, 40, 65, 30, 70, 71, 20, 40];
        $lis   = [10, 22, 33, 41, 60, 65, 70, 71];

        $this->assertLIS($array, $lis);
    }
}
