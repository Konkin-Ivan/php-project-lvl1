<?php

namespace BrainGames\GamesEngine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

function run($descriptionGame, $gameData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line($descriptionGame);
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        [$answer, $question] = $gameData();
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $answer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
