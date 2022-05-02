<?php

session_start();
// session_destroy();

    include 'db.php';
    include 'data-collector.php';
    
    $currentQuestionIndex = 3;
    
    if (isset($_POST['lastQuestionIndex'])) {
        $lastQuestionIndex = $_POST['lastQuestionIndex'];

        if (isset ($_POST['nextQuestionIndex'])) {
            $currentQuestionIndex = $_POST['nextQuestionIndex'];
        }
    };

    if (isset($_SESSION['questions'])) {
        $questions = $_SESSION['questions'];
    }
    else {
        $questions = getQuestions();
        $_SESSION['questions'] = $questions;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>

<h2>Tech-Quizz</h2><hr>
<h3>Question: <?php echo $currentQuestionIndex; ?><h3>
<p><?php echo $questions[$currentQuestionIndex]['Text']; ?></p>

<form class="form" <?php 
    if ($currentQuestionIndex + 1 >= count($questions)) echo 'action="result.php" ';?> method="post">

        <?php
            $answers = $questions[$currentQuestionIndex]['Text2'];
            // $Type = $questions[$currentQuestionIndex]['Type'];

            $maxPoints = 0;

            for ($a = 0; $a < count($answers); $a++ ) {
            $IsCorrectAnswer = $answers[$a]['IsCorrectAnswer'];
            echo '<br><button type="submit" for="i-' . $a . '">'; 
            $answers = $questions[$currentQuestionIndex]['Text2'];
            echo $answers[$a]['Text2'];
            echo '</button><br>'; 
            
            $maxPoints += $IsCorrectAnswer;
    }
    /*
    if(array_key_exists('answers', $_POST)) {
    
        if($_POST['answers'] == $IsCorrectAnswer[$_SESSION['questions']])
        {
            $_SESSION['questions']++;
            $_SESSION['Correct']++;
        }
        else
    {
            $_SESSION['questions']++;
            $_SESSION['Wrong']++;

    }
    }
    */         
?>                
    <!--<br><button type="submit" class="answer1" name="answer" value="1"><?php
        //    $answers = $questions[$currentQuestionIndex]['Text2'];
        //    echo $answers[0]['Text2'];
        ?></button><br><br>
         
    <button type="submit" class="answer2" name="answer" value="2"><?php
        //    $answers = $questions[$currentQuestionIndex]['Text2'];
        //    echo $answers[1]['Text2'];
        ?></button><br><br>
        
    <button type="submit" class="answer3" name="answer" value="3"><?php
        //  $answers = $questions[$currentQuestionIndex]['Text2'];
        //  echo $answers[2]['Text2'];
        ?></button><br><br>
     
    <button type="submit" class="answer4" name="answer" value="4"><?php
        //  $answers = $questions[$currentQuestionIndex]['Text2'];
        //  echo $answers[3]['Text2'];
        ?></button><br><br>
    -->    

    <input type="hidden" name="lastQuestionIndex" value="<?php echo $currentQuestionIndex; ?>">
    <input type="hidden" name="nextQuestionIndex" value="<?php echo $currentQuestionIndex + 1; ?>">
    <input type="hidden" name="maxPoints" value="<?php echo $maxPoints; ?>">

        </form>
    </main>
    
</body>

</html>