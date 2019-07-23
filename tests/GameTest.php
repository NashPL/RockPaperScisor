<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lib\Game;

final class GameTest extends TestCase
{
    public function testInitalizeOfTheClassCorrectParameters()
    {
        $game = new Game();
        $this->assertSame(2, $game->getDifficulty());
    }
    
    public function testInitalizeOfTheClassUsingMinusOne()
    {
        $this->expectException(InvalidArgumentException::class);
        $game = new Game(-1);
    }

    public function testInitalizeOfTheClassWithStringAsParameter()
    {
        $this->expectException(TypeError::class);
        $game = new Game("This is a test.");
    }

    public function testInitalizeOfTheClassWithNullProvidedAsParameter()
    {
        $this->expectException(TypeError::class);
        $game = new Game(NULL);
    }

    public function testSetDifficulty()
    {
        $game = new Game();
        $game->setDifficulty(4);
        $this->assertSame(4, $game->getDifficulty());
        $this->assertIsInt($game->getDifficulty());
    }

    public function testGetAIElement()
    {
        $game = new Game();
        $result = $this->invokeMethod($game, 'getElement');
        $this->assertLessThanOrEqual(2, $result);
    }

    public function testCompareResult()
    {
        $game = new Game();
        $result = $this->invokeMethod($game, 'compareResult', [0, 1]);
        $this->assertSame('A.I Win', $result);

        $result = $this->invokeMethod($game, 'compareResult', [0, 2]);
        $this->assertSame('Player Win', $result);

        $result = $this->invokeMethod($game, 'compareResult', [1, 1]);
        $this->assertSame('Draw', $result);
    }


    private function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }
}