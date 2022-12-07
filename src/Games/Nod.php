<?php

namespace BrainGames\Games\Nod;

use function BrainGames\GamesEngine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN_VALUE = 1;
const MAX_VALUE = 99;

function startGame(): void
{
    $gameData = function () {
        $firstNum = rand(MIN_VALUE, MAX_VALUE);
        $lastNum = rand(MIN_VALUE, MAX_VALUE);
        $answer = nod($firstNum, $lastNum);
        $question = "{$firstNum} {$lastNum}";

        return [$answer, $question];
    };
    run(DESCRIPTION, $gameData);
}

function nod(int $firstNum, int $lastNum): int
{
    while (true) {
        switch ($firstNum) {
            case ($firstNum === $lastNum):
                return $lastNum;
            case ($firstNum > $lastNum):
                $firstNum -= $lastNum;
                break;
            default:
                $lastNum -= $firstNum;
        }
    }
}
