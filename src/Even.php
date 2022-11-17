<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

const START_RANGE = 0;
const END_RANGE = 100;
const GAME_INIT = 'Answer "yes" if the number is even, otherwise answer "no".';
const TRUE_VALUE = true;
const FALSE_VALUE = false;
const CONGRATULATION = "Congratulations, Bill!";
const TRY_AGAIN = "Let's try again, Bill!";
function parityCheck()
{
    line(GAME_INIT);
    $result = '';
    for ($i = 0; $i < 3; $i++) {
        $num = rand(START_RANGE, END_RANGE);
        $question = prompt("Question: {$num}");
        if ($question !== 'yes' || $question !== 'no') {
            print_r("is wrong answer ;(");
            print_r("\n");
            print_r(TRY_AGAIN);
            print_r("\n");
            return;
        }
        line('Your answer: %s', $question);
        $yes = "Correct!";
        $no = "'yes' is wrong answer ;(. Correct answer was 'no'.";
        $expression = $num % 2 === 0;
        switch ($expression) {
            case ($expression === TRUE_VALUE && $question === 'yes'):
                print_r($yes);
                print_r("\n");
                $result = CONGRATULATION;
                break;
            case ($expression === FALSE_VALUE && $question === 'no'):
                print_r($yes);
                print_r("\n");
                $result = CONGRATULATION;
                break;
            case ($expression === FALSE_VALUE && $question === 'yes'):
                print_r($no);
                print_r("\n");
                print_r(TRY_AGAIN);
                print_r("\n");
                return;
            case ($expression === TRUE_VALUE && $question === 'no'):
                print_r("'no' is wrong answer ;(. Correct answer was 'yes'. ");
                print_r("\n");
                print_r(TRY_AGAIN);
                print_r("\n");
                return;
        }
    }
    return $result;
}
