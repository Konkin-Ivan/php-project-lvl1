<?php

namespace BrainGames\Games\Nod;

use function BrainGames\GamesEngine\run;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN_VALUE = 1;
const MAX_VALUE = 99;

function startGame()
{
    $gameData = function()
    {
        $a = rand(MIN_VALUE, MAX_VALUE);
        $b = rand(MIN_VALUE, MAX_VALUE);
        $nod = function($a, $b)
        {
            while(true) {
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
        };
        $random = "$a $b";
        $answer = prompt("Question: {$random}");
        line("You answer: {$answer}");
        $trueAnswer = $nod($a, $b);
        return [$answer, $trueAnswer];
    };
    run(DESCRIPTION, $gameData);
}
