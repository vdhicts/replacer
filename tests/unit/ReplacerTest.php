<?php

namespace Vdhicts\Dicms\Replacer\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Vdhicts\Dicms\Replacer\Replacer;

class ReplacerTest extends TestCase
{
    public function testInitialisation()
    {
        $this->assertTrue(class_exists(Replacer::class));

        $replacer = new Replacer();

        $this->assertInstanceOf(Replacer::class, $replacer);
    }

    public function testDefaultValues()
    {
        $replacer = new Replacer();

        $this->assertSame('test', $replacer->process('test'));
    }

    public function testWithValues()
    {
        $tokens = [
            'test1' => 1,
            'test2' => 2
        ];
        $replacer = new Replacer($tokens);

        $this->assertSame('1 en 2', $replacer->process('[TEST1] en [TEST2]'));
    }

    public function testWithValuesWithCustomDelimiters()
    {
        $tokens = [
            'test1' => 1,
            'test2' => 2
        ];
        $replacer = new Replacer($tokens, '%', '#');

        $this->assertSame('1 en 2', $replacer->process('%TEST1# en %TEST2#'));
    }
}
