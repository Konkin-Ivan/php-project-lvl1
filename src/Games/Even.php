<?php

namespace BrainGames\Games\Even;

use function BrainGames\GamesEngine\run;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_VALUE = 1;
const MAX_VALUE = 99;

function startGame(): void
{
    $gameData = function()
    {
        $question = rand(MIN_VALUE, MAX_VALUE);

        $answer = isEven($question) ? 'yes' : 'no';
        return [$answer, $question];
    };
    run(DESCRIPTION, $gameData);

}
function isEven(int $num): bool
{
    return $num % 2 === 0;
}