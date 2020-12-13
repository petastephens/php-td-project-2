<?php
session_start();
include 'inc/generate_questions.php';

// Generate a new set of questions for the session using function
if (!isset($_SESSION['questions'])) {
    $_SESSION['questions'] = generate_questions();
} 

$totalQuestions = count($_SESSION['questions']);
$toast = null;
$show_score = false;

// Check if the current answer is correct or not and set appropriate message to user
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['answer'] == $_SESSION['questions'][$_POST['index']]['correctAnswer']) {
        $toast = "Nice one, you are correct!";
        $_SESSION['total_correct'] += 1;
    } else {
        $toast = "Oops, not correct this time.";
    }
}

// Check for a session variable to hold used indexes and correct answers - create these variable if not set
if (!isset($_SESSION['used_indexes'])) {
    $_SESSION['used_indexes'] = [];
    $_SESSION['total_correct'] = 0;
} 

// Check to see when all questions have been displayed  
// Display score reset variables and session if true
if (count($_SESSION['used_indexes']) == $totalQuestions) {
    $_SESSION['used_indexes'] = [];
    $show_score = true;
    session_destroy();
} else { // else continue quiz
    $show_score = false;
    if (count($_SESSION['used_indexes']) == 0) {
        $_SESSION['total_correct'] = 0;
        $toast = '';
    }
    do {
        $index = array_rand($_SESSION['questions'], 1);
    } while (in_array($index, $_SESSION['used_indexes']));
    
    $question = $_SESSION['questions'][$index];
    array_push($_SESSION['used_indexes'], $index);
    $answers = [
        $question['correctAnswer'],
        $question['firstIncorrectAnswer'],
        $question['secondIncorrectAnswer']
    ];
    shuffle($answers);
}
