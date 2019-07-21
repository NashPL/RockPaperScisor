<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lib\Game;

final class GameTest extends TestCase
{
    public function testInitalizeOfTheClassCorrectParameters()
    {
        $game = new Game();
        $this->assertSame(2, $game->getDifficulty);
    }   
}