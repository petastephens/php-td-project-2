<?php include 'inc/quiz.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <div id="quiz-box">
            <?php
            if (!empty($toast)) {
                echo "<p>$toast</p>";
            }
            if (!$show_score) {
                echo '<p class="breadcrumbs">Question ' . count($_SESSION['used_indexes']) . ' of ' . $totalQuestions . '</p>';
                echo '<p class="quiz">What is ' . $question['leftAdder'] . ' + ' . $question['rightAdder'] . '?</p>';
                echo '<form action="index.php" method="post">';
                echo '<input type="hidden" name="index" value="' . $index . '" />';
                echo '<input type="submit" class="btn" name="answer" value="' . $answers[0] . '" />';
                echo '<input type="submit" class="btn" name="answer" value="' . $answers[1] . '" />';
                echo '<input type="submit" class="btn" name="answer" value="' . $answers[2] . '" />';
                echo '</form>';
            }
            if ($show_score) {
                echo '<p class="quiz">You got ' . $_SESSION['total_correct'] . ' of ' . $totalQuestions . ' correct!</>';
                echo '<a class="btn" href="/index.php">Take Quiz Again</a>';
            }
            ?>
        </div>
    </div>
</body>

</html>