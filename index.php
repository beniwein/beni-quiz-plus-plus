<!--session_start();

if ($_POST["answer"] == 4) {
    $_SESSION["score"] += 1;
} 
?> -->

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

<?php
    echo '<br> <br>';

    $dbHost = getenv('DB_HOST');
    $dbName = getenv('DB_NAME');
    $dbUser = getenv('DB_USER');
    $dbPassword = getenv('DB_PASSWORD');

    $dbConnection = new PDO('mysql:host=mysql;dbname=library', 'webDev', 'opport2022');

    //$query = $dbConnection->query("SELECT * FROM Questions");
    //$query = $dbConnection->query("SELECT Text, Text2 FROM Questions, Answers WHERE ID = 4 AND QuestionId = 4");
    $query = $dbConnection->query("SELECT Text FROM Questions WHERE ID = 4");
    //$query = $dbConnection->query("SELECT Text2 FROM Answers WHERE QuestionId = 4");

    
    
// $query = $dbConnection->query("SELECT Text,Text2 FROM Questions, Answers WHERE IsCorrectAnswer = 1 AND QuestionId = ID");
// requires !Foreign-KEY! to match with PRIMARY-KEY *************

    //$query = $dbConnection->query("SELECT Text FROM Answers");
                             
    echo '<div class="container-fluid p-5">';
    echo '<div class="h3">Tech Quiz</div>';
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';

    $columnCount = $query->columnCount();

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
    
    echo '</table>';
    echo '</div>';
    echo '</div>';

    // echo '<pre>';
    // print_r($query);
    // echo '</pre>';

    ?>

        </div>

        <form class="form" action="result.php" method="post">

        
        
    <br><button type="submit" class="answer1" name="answer" value="1">Digital wallet</button><br><br>
        <button type="submit" class="answer2" name="answer" value="2">Mining</button><br><br>
        <button type="submit" class="answer3" name="answer" value="3">Blockchain</button><br><br>
        <button type="submit" class="answer4" name="answer" value="4">Token</button>

        </form>
    </main>
    
</body>

</html>

