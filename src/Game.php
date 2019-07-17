<?php

namespace Lib;

class Game 
{
    private static $elements = [0 => "rock", 1 => "scissor", 2 => "paper"];
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
        return $this->compareResult($userInput, $gameInput);
    }

    private function getElement() : string
    {
        $getElement = self::$elements[rand(0, 2)];
        self::$tries++;
        var_dump(self::$tries);
        var_dump(self::$lastElement);
        var_dump($getElement);
        if ($getElement == self::$lastElement || self::$tries <= 3) {
            self::$lastElement = $getElement;
            return $this->getElement();
        } else {
            $getElement = $this->$elements[rand(0, 2)];
            self::$lastElement = -1;
            self::$tries = 0;
            return $getElement;
        } 
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