<?php
require_once('vendor/autoload.php');

use Lib\Game;

$game = new Game();
print($game->startGame(0) . "\n");
exit;