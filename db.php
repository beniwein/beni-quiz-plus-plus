<?php

function getQuestions() {
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

        return $questions;

    }
    
    ?>