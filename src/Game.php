<?php

namespace Lib;

class Game 
{
    private static $lastElement = -1;
    private static $tries = 0;
    private $difficulty;

    public function __construct($difficulty = 2)
    {
        $this->difficulty = $difficulty;
    }

    public function setDifficulty($difficulty) : void
    {
        $this->difficulty = $difficulty;
    }

    public function startGame($userInput) : string
    {
        $gameInput = $this->getElement();
        print("\n == $gameInput == \n");
        print("\n == $userInput == \n");
        return $this->compareResult($userInput, $gameInput);
    }

    private function getElement() : int
    {
        $getElement = rand(0, 2);
    
        while ($getElement == self::$lastElement || self::$tries < 3) {
            self::$lastElement = $getElement;
            self::$tries++;
            $getElement = rand(0, 2);
        }

        $getElement = rand(0, 2);
        self::$lastElement = -1;
        self::$tries = 0;
        return $getElement;
    }

    private function compareResult($userInput, $gameInput) : string
    {
        switch ($userInput) {
            case "0":
                if($gameInput === 0) {
                    return "DRAW";
                } else if ($gameInput === 1) {
                    return "USER WIN";
                } else if ($gameInput === 2) {
                    return "GAME WIN";
                } else {
                    return "SOMETHING WENT WRONG";
                }
                break;
            case "1":
                if($gameInput === 0) {
                    return "GAME WIN";
                } else if ($gameInput === 1) {
                    return "DRAW";
                } else if ($gameInput === 2) {
                    return "USER WIN";
                } else {
                    return "SOMETHING WENT WRONG";
                }
                break;
            case "2":
                if($gameInput === 0) {
                    return "USER WIN";
                } else if ($gameInput === 1) {
                    return "GAME WIN";
                } else if ($gameInput === 2) {
                    return "DRAW";
                } else {
                    return "SOMETHING WENT WRONG";
                }
                break;
            default:
                return "WRONG USER INPUT";
                break;
        }
    }
}