<?php

namespace BrainGames\Games\Prime;

use function BrainGames\GamesEngine\run;


const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_VALUE = 1;
const MAX_VALUE = 99;

function startGame(): void
{
    $gameData = function()
    {
        $simpleData = simpleGenerator();
        [$state, $num] = $simpleData;
        $question = $num;
        $answer = $state ? 'yes' : 'no';
        return [$answer, $question];
    };
    run(DESCRIPTION, $gameData);
}

function simpleGenerator(): array
{
    $num = rand(MIN_VALUE, MAX_VALUE);
    $state = true;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            $state = false;
        }
    }
    return [$state, $num];

}