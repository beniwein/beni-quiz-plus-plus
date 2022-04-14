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

<br><h2>Quiz End</h2>
<h3>Your Result:</h3>

<?php
    session_start();

    $_SESSION["index"] = $_POST["index"];

    $score = $_SESSION['Correct'];

    if ($score > 7) { 
        
            echo  "<h1>You win - thanks for playing...</h1>" . "<br>";
        
        }  else { 
            echo "<h1>You lose - try again...</h1>" . "<br>";
         
    }

    print_r ('Score: ' . $score);
?>

<a class="btn btn-primary btn-sm float-end" href="index.php" type="button">Back to Quiz</a>

<!-- hidden field -->
<input type="hidden" id="feedbackId" name="feedbackId" value="feedback">

<script src="main.js"></script>
</body>

</html>