<?php

namespace BrainGames\Games\Calc;

use function BrainGames\GamesEngine\run;

const DESCRIPTION = 'What is the result of the expression?';
const MIN_VALUE = 1;
const MAX_VALUE = 99;
const OPERATOR_COLLECTIONS = ['+', '-', '*'];

function startGame(): void
{
    /**
     * @throws \Exception
     */
    $gameData = function () {
        $firstNum = rand(MIN_VALUE, MAX_VALUE);
        $lastNum = rand(MIN_VALUE, MAX_VALUE);
        $operator = OPERATOR_COLLECTIONS[array_rand(OPERATOR_COLLECTIONS)];

        $question = "{$firstNum} {$operator} {$lastNum}";
        $expressionCollection = [$firstNum, $operator, $lastNum];
        $answer = calculate($expressionCollection);

        return [$answer, $question];
    };
    run(DESCRIPTION, $gameData);
}

/**
 * @throws \Exception
 */
function calculate(array $expressionCollection)
{
    [$firstNum, $operator, $lastNum] = $expressionCollection;
    $result = '';
    switch ($operator) {
        case ($operator === '+'):
            $result = $firstNum + $lastNum;
            break;
        case ($operator === '-'):
            $result = $firstNum - $lastNum;
            break;
        case ($operator === '*'):
            $result = $firstNum * $lastNum;
            break;
        default:
            throw new \Exception("Not found operator: $operator!");
    };
    return $result;
}
