<?php

namespace Lib;

use phpDocumentor\Reflection\Types\Integer;

/**
 * A simple Game class which will check user and computer entries and compare them to each other to declare 
 * a win, draw or a lost for a user.
 */
class Game 
{
    private static $lastElement = -1;
    private static $tries = 0;
    private $difficulty;

    /**
     * Constructor it sets a difficulty of a game which just decideds how many times the computer will reroll 
     * the outcome if the finnal is set as a draw. 
     * @param Int Difficutly level. 
     */
    public function __construct(Integer $difficulty = 2)
    {
        $this->difficulty = $difficulty;
    }

    /**
     * Sets a new difficulty level
     * @param Int Difficulty level. 
     * @return void
     */
    public function setDifficulty(int $difficulty) : void
    {
        $this->difficulty = $difficulty;
    }

    /**
     * Gets a difficulty level
     * @return int Difficulty level.
     */
    public function getDifficulty() : int
    {
        return $this->difficulty;
    }

    /**
    * Starts a game by accepting a user entry.
    * 0 = Rock
    * 1 = Scisor
    * 2 = Paper
    * @param Int User input.
    * @return String A outcome as a string (win, draw, lost).
    */
    public function startGame($userInput) : string
    {
        $gameInput = $this->getElement();
        return $this->compareResult($userInput, $gameInput);
    }

    /**
     * Private function which geneartes a computer element.
     * @return Int A Integer 0-2. 
     */
    private function getElement() : int
    {
        $getElement = rand(0, 2);
    
        while ($getElement == self::$lastElement || self::$tries < $this->difficulty) {
            self::$lastElement = $getElement;
            self::$tries++;
            $getElement = rand(0, 2);
        }

        $getElement = rand(0, 2);
        self::$lastElement = -1;
        self::$tries = 0;
        return $getElement;
    }

    /**
     * Private function which compares user and computer results.
     * It calculates the String output of a comparison. 
     * @param Int User input intiger.
     * @param Int Computer input intiger.
     * @return String Outcome of a game. 
     */
    private function compareResult(int $userInput, int $gameInput) : string
    {
        $result = [
            0 => 1,
            1 => 2,
            2 => 0
        ];
        
        if ($userInput === $gameInput) {
            return "Draw";
        } else if ($result[$userInput] === $gameInput) {
            return "A.I Win";
        } else {
            return "Player Win";
        }
    }
}