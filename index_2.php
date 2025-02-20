<?php

$secretnNumber = rand(1, 100);
$attempts = 0;

echo "Угадайте число от 1 до 100.\n*";

while (true) {
  $guess = (int) readline("Ваш вариант: ");
  $attempts++;

  if ($guess < $secretnNumber) {
    echo "Слишком мало\n*";
  } elseif ($guess > $secretnNumber) {
    echo "Слишком много\n*";
  } else {
    echo "Вы угадали за $attempts попыток!\n";
    break;
  }
}