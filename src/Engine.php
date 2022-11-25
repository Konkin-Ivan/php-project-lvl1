<?php

namespace BrainGames\GamesEngine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

function run(string $descriptionGame, $gameData): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line($descriptionGame);
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        [$answer, $trueAnswer] = $gameData();
        if ($answer == $trueAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$trueAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
