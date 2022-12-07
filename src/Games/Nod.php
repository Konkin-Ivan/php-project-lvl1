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
        if ($firstNum === $lastNum) {
            return $lastNum;
        } elseif ($firstNum > $lastNum) {
            $firstNum -= $lastNum;
        } else {
            $lastNum -= $firstNum;
        }
    }
}
