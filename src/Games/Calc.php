<?php

namespace BrainGames\Games\Calc;

use function BrainGames\GamesEngine\run;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'What is the result of the expression?';
const MIN_VALUE = 1;
const MAX_VALUE = 99;
const OPERATOR_COLLECTIONS = ['+', '-', '*'];
const OPERATOR_INDEX = 2;

function startGame(): void
{
    function calc($expressionCollection)
    {
        $result = '';
        [$firstNum, $operator, $lastNum] = $expressionCollection;
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
        }
        return $result;
    }
    $gameData = function(): array
    {
        $a = rand(MIN_VALUE, MAX_VALUE);
        $b = rand(MIN_VALUE, MAX_VALUE);
        $operatorIndex = rand(0, OPERATOR_INDEX);
        $operator = OPERATOR_COLLECTIONS[$operatorIndex];
        if ($a < $b) {
            $firstNum = $b;
            $lastNum = $a;
            $expression = "{$firstNum} {$operator} {$lastNum}";
            $expressionCollection = [$firstNum, $operator, $lastNum];
            $trueAnswer = calc($expressionCollection);
        } else {
            $firstNum = $a;
            $lastNum = $b;
            $expression = "{$firstNum} {$operator} {$lastNum}";
            $expressionCollection = [$firstNum, $operator, $lastNum];
            $trueAnswer = calc($expressionCollection);
        }
        $question = prompt("Question: {$expression}");
        $answer = $question;
        line("You answer: {$answer}");


        return [$answer, $trueAnswer];
    };
    run(DESCRIPTION, $gameData);
}
