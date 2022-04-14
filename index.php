<!--session_start();

if ($_POST["answer"] == 4) {
    $_SESSION["score"] += 1;
} 
?> -->

<?php
    $currentQuestionIndex = 3;

    if (isset($_POST['lastQuestionIndex'])) {

        if (isset ($_POST['nextQuestionIndex'])) {
            $currentQuestionIndex = $_POST['nextQuestionIndex'];
        }
    };

    $dbHost = getenv('DB_HOST');
    $dbName = getenv('DB_NAME');
    $dbUser = getenv('DB_USER');
    $dbPassword = getenv('DB_PASSWORD');

    $dbConnection = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');

    //$query = $dbConnection->query("SELECT * FROM Questions");
    //$query = $dbConnection->query("SELECT Text, Text2 FROM Questions, Answers WHERE ID = 4 AND QuestionId = 4");
    //$query = $dbConnection->query("SELECT Text FROM Questions WHERE ID = 4");
    //$query = $dbConnection->query("SELECT Text2 FROM Answers WHERE QuestionId = 4");

    $query = $dbConnection->query("SELECT * FROM Questions");
    $questions = $query->fetchAll(PDO::FETCH_ASSOC);

    // $query = $dbConnection->query("SELECT Text,Text2 FROM Questions, Answers WHERE IsCorrectAnswer = 1 AND QuestionId = ID");
    // requires !Foreign-KEY! to match with PRIMARY-KEY *************

    //$query = $dbConnection->query("SELECT Text FROM Answers");
                             
    for ($key = 0; $key < count($questions); $key++) {
        $question = $questions[$key];
        $subQuery = $dbConnection->prepare("SELECT * FROM Answers WHERE Answers.QuestionId = ?");
        $subQuery->bindValue(1, $question['ID']);    
        $subQuery->execute();
        $answers = $subQuery->fetchAll(PDO::FETCH_ASSOC);
        $questions[$key]['Text2'] = $answers;
    }

    $_SESSION['quizData'] = $questions;

    //echo '<pre>';
    //print_r($_SESSION['quizData']);
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
        

        <form class="form" method="post">
        <h2>Tech-Quizz</h2><hr>
        <h3>Question: <?php echo $currentQuestionIndex; ?><h3>
        <p><?php echo $questions[$currentQuestionIndex]['Text']; ?></p>

        <?php
            $answers = $questions[$currentQuestionIndex]['Text2'];
                
            for ($a = 0; $a < count($answers); $a++ ) {
            $IsCorrectAnswer = $answers[$a]['IsCorrectAnswer'];
            echo '<br><button type="submit" name="answer" value="' . $IsCorrectAnswer . '">'; 
            $answers = $questions[$currentQuestionIndex]['Text2'];
            echo $answers[$a]['Text2'];
            echo '</button><br>';
    }
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

