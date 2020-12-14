<?php

// Create a fucntion to dynamically generate a set of quiz questions in each session
function generate_questions()
{
    $numOfQuestions = 10;

    for ($i = 0; $i < $numOfQuestions; $i++) {
        $leftAdder = rand(1, 100);
        $rightAdder = rand(1, 100);
        $correctAnswer = $leftAdder + $rightAdder;
        do {
            $firstIncorrectAnswer = rand($correctAnswer - 10, $correctAnswer + 10);
        } while ($firstIncorrectAnswer == $correctAnswer);
        
        do {
            $secondIncorrectAnswer = rand($correctAnswer - 10, $correctAnswer + 10);
        } while ($secondIncorrectAnswer == $firstIncorrectAnswer || $secondIncorrectAnswer == $correctAnswer);

        $questions[$i] =
            [
                "leftAdder" => $leftAdder,
                "rightAdder" => $rightAdder,
                "correctAnswer" => $correctAnswer,
                "firstIncorrectAnswer" => $firstIncorrectAnswer,
                "secondIncorrectAnswer" => $secondIncorrectAnswer
            ];
    }

    return $questions;
}
