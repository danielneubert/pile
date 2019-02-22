<?php

declare(strict_types=1);

namespace Neubert\Tests\Pile;

use Neubert\Pile\Pile;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

final class PileTest extends TestCase
{
    public function testSingleKey()
    {
        $this->assertEquals(
            'found',
            Pile::find($this->dataArray(), 'test-1')
        );
    }

    public function testStringAndIntegerKey()
    {
        $this->assertEquals(
            'found',
            Pile::find($this->dataArray(), 'test-2', 0)
        );
    }

    public function testTwoKeys()
    {
        $this->assertEquals(
            'found',
            Pile::find($this->dataArray(), 'test-3', 'key-1')
        );
    }

    public function testObject()
    {
        $this->assertEquals(
            'found',
            Pile::find($this->dataArray(), 'test-4', 'key-1')
        );
    }

    public function testMultibleKeys()
    {
        $this->assertEquals(
            'found',
            Pile::find($this->dataArray(), 'test-5', 'key-1', 'key-2')
        );
    }

    public function testFourKeys()
    {
        $this->assertEquals(
            'found',
            Pile::find($this->dataArray(), 'test-6', 'rows', 0, 'col')
        );
    }

    /**
     * All possible combinations for testing.
     *
     * @return array
     */
    public function dataArray()
    {
        return [
            'test-1' => 'found',
            'test-2' => ['found'],
            'test-3' => ['key-1' => 'found'],
            'test-4' => (object) ['key-1' => 'found'],
            'test-5' => ['key-1' => ['key-2' => 'found']],
            'test-6' => ['rows' => [0 => ['col' => 'found']]],
        ];
    }
}
