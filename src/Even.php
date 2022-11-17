<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\welcomeUser;

function parityCheck()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $result = '';
    for ($i = 0; $i < 3; $i++) {
        $num = rand(0, 100);
        $question = prompt("Question: {$num}");
        if ($question !== 'yes' && $question !== 'no') {
            print_r("is wrong answer ;(.\n Let's try again, {$name}!");
            print_r("\n");
            return;
        }
        line("Your answer: {$question}");
        $right = 'Correct!';
        $yes = 'yes';
        $no = 'no';
        $expression = $num % 2 === 0;
        $correct = $expression ? $yes : $no;
        $wrong = "'{$question}' is wrong answer ;(. Correct answer was '{$correct}'.\n Let's try again, {$name}!";
        switch ($expression) {
            case (true && $question === $yes || false && $question === $no):
                print_r($right);
                print_r("\n");
                $result = "Congratulations, {$name}!";
                break;
            case (true && $question === $no || false && $question = $yes):
                print_r($wrong);
                print_r("\n");
                return;
            default:
                return;
        }
    }
    print_r($result);
}
