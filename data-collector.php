<?php
// session_start();

if (isset($_POST['lastQuestionIndex'])) {
    $lastQuestionIndex = $_POST['lastQuestionIndex'];
    $questionKey = 'a' . $lastQuestionIndex;

    $achievedPoints = 0;

    foreach ($_POST as $key => $value) {
        if (str_contains($key, 'a')) {
            $achievedPoints += intval($value);
        }
    }

$_SESSION['achievedPointsList'][$questionKey] = $achievedPoints;

$maxPoints = intval($_POST['maxPoints']);
}

if (!isset($_SESSION['maxPointsList'])) {
    $_SESSION['maxPointsList'] = array();

    $_SESSION['maxPointsList'][$questionKey] = $maxPoints;
}
?>
