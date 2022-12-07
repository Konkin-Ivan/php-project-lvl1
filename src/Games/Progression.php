<?php

namespace BrainGames\Games\Progression;

use function BrainGames\GamesEngine\run;

const DESCRIPTION = 'What number is missing in the progression?';
const MIN_VALUE = 1;
const MAX_VALUE = 10;
const STEP_COLLECTION = [1, 2, 3, 4, 5];

function startGame(): void
{
    $gameData = function () {
        $dataResultCollection = mutatingCollection(MIN_VALUE, MAX_VALUE);
        [$stringCollection, $trueAnswer] = $dataResultCollection;
        $question = $stringCollection;
        $answer = $trueAnswer;
        return [$answer, $question];
    };
    run(DESCRIPTION, $gameData);
}

function progression($a, $b): array
{
    $step = array_rand(STEP_COLLECTION);
    $progressCollection = [];
    $current = MIN_VALUE;
    for ($i = MIN_VALUE; $i <= MAX_VALUE; $i++) {
        $sum = $current + STEP_COLLECTION[$step];
        $progressCollection[] = $sum;
        $current = $sum;

    }
    return $progressCollection;
}

function mutatingCollection(): array
{
    $collection = progression(MIN_VALUE, MAX_VALUE);
    $resultCollection = [];
    $random = rand(1, 9);
    $trueAnswer = '';
    foreach ($collection as $index => $value) {
        if ($index === $random) {
            $trueAnswer = $value;
            $resultCollection[] = '..';
        } else {
            $resultCollection[] = $value;
        }
    }
    $stringCollection = implode(' ', $resultCollection);
    return [$stringCollection, $trueAnswer];
}
