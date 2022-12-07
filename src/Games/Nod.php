<?php

namespace BrainGames\Games\Nod;

use function BrainGames\GamesEngine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN_VALUE = 1;
const MAX_VALUE = 99;

function startGame(): void
{
    $gameData = function () {
        $a = rand(MIN_VALUE, MAX_VALUE);
        $b = rand(MIN_VALUE, MAX_VALUE);
        $answer = nod($a, $b);
        $question = "{$a} {$b}";

        return [$answer, $question];
    };
    run(DESCRIPTION, $gameData);
}

function nod($a, $b): int
{
    while (true) {
        switch ($a) {
            case ($a === $b):
                return $b;
            case ($a > $b):
                $a -= $b;
                break;
            default:
                $b -= $a;
        }
    }
}
