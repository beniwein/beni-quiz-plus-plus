<?php 
    include 'data-collector.php';
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

<br><h2>Quiz End</h2>
<h3>Your Result:</h3>

<?php
    if (isset($_SESSION['achievedPointsList'])) {
        $achievedPointsList = $_SESSION['achievedPointsList'];
    }
    else {
        $achievedPointsList = array();
    }
    if (isset($_SESSION['maxPointsList'])) {
        $maxPointsList = $_SESSION['maxPointsList'];
    }
    else {
        $maxPointsList = array();
    }
    $total = 0;

    foreach ($achievedPointsList as $key => $value) {
        $total += $value;
    }
    $maxTotal = 0;

    foreach ($maxPointsList as $key => $value) {
        $maxTotal += $value;
    }

    if ($total / $maxTotal >= 0.8) {
        $exclamation = 'Great';
    }
    else if ($total / $maxTotal >= 0.4) {
        $exclamation = 'Okay';
    }
    else {
        $exclamation = 'Ups';
    }
?>

<h3><?php echo $exclamation; ?>, you got <?php echo $total; ?> of <?php echo $maxTotal; ?> points!</h3>
<?php echo '------- $total von $maxTotal funktioniert noch nicht richtig.-------'?>

<form method="post">
<a class="btn btn-primary btn-sm float-end" href="index.php" type="button">Back to Quiz</a>
</form>

<script src="js/main.js"></script>
</body>

</html>