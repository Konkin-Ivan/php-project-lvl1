<?php

namespace BrainGames\Game;

function parityCheck($num)
{
  $yes = "Correct!";
  $no = "'yes' is wrong answer ;(. Correct answer was 'no'. Let's try again, Bill!";
  $expression = $num % 2 === 0;
  $result = $expression ? $yes : $no;
  return $result;
}
//print_r(parityCheck(15));
