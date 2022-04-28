<?php

    include 'db.php';

    session_start();

    $currentQuestionIndex = 3;

    if (isset($_POST['lastQuestionIndex'])) {

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


    //echo '<pre>';
    //print_r($_SESSION['questions']);
    //echo '</pre>';

    
    
// $query = $dbConnection->query("SELECT Text,Text2 FROM Questions, Answers WHERE IsCorrectAnswer = 1 AND QuestionId = ID");
// requires !Foreign-KEY! to match with PRIMARY-KEY *************

    //$query = $dbConnection->query("SELECT Text FROM Answers");
                             
    //echo '<div class="container-fluid p-5">';
    //echo '<div class="h3">Tech Quiz</div>';
    //echo '<table class="table table-striped">';
    //echo '<thead>';
    //echo '<tr>';

    /*$columnCount = $query->columnCount();

    for ($i = 0; $i < $columnCount; $i++) {
        $columnInfo = $query->getColumnMeta($i);
        $columnName = $columnInfo['name'];
        echo "<td>$columnName</td>";
    }

    echo '</tr>';
    echo '</thead>';
        
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
       echo '<tr>';
       foreach ($row as $columnName => $value) {
        echo "<td>$value<td>";
       }

       echo '</tr>';
       
    }
    */
    //echo '</table>';
    //echo '</div>';
    //echo '</div>';

    // echo '<pre>';
    // print_r($query);
    // echo '</pre>';

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
        

        <form class="form" <?php 
            if ($currentQuestionIndex + 1 == count($questions)) echo 'action="result.php" ';?> 
            method="post">

        <h2>Tech-Quizz</h2><hr>
        <h3>Question: <?php echo $currentQuestionIndex; ?><h3>
        <p><?php echo $questions[$currentQuestionIndex]['Text']; ?></p>

        <?php
            $answers = $questions[$currentQuestionIndex]['Text2'];
            $Type = $questions[$currentQuestionIndex]['Type'];

        /*    for ($a = 0; $a < count($answers); $a++) {
                if ($Type == MULTIPLE) {


                }
                else {
                    
                }
            }*/

            for ($a = 0; $a < count($answers); $a++ ) {
            $IsCorrectAnswer = $answers[$a]['IsCorrectAnswer'];
            echo '<br><button type="submit" name="answer" value="' . $IsCorrectAnswer . '">'; 
            $answers = $questions[$currentQuestionIndex]['Text2'];
            echo $answers[$a]['Text2'];
            echo '</button><br>';            
    }
            
            //break;
            //echo '<form class="form" method="post" action="result.php">';
   
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

        <input type="hidden" name="lastQuestionIndex" value="<?php echo $currentQuestionIndex;?>">
        <input type="hidden" name="nextQuestionIndex" value="<?php echo $currentQuestionIndex +1;?>">



        </form>
    </main>
    
</body>

</html>

