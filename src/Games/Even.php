<?php

namespace BrainGames\Games\Even;

use function BrainGames\GamesEngine\run;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_VALUE = 1;
const MAX_VALUE = 99;

function parityCheck()
{
    $gameData = function()
    {
        $random = rand(MIN_VALUE, MAX_VALUE);
        $answer = prompt("Question: {$random}");
        line("You answer: {$answer}");
        $expression = $random % 2 === 0;
        $trueAnswer = $expression ? 'yes' : 'no';
        return [$answer, $trueAnswer];
    };
    run(DESCRIPTION, $gameData);

}
