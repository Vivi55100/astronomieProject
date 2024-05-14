<?php
    include_once "../../../model/role.php";
    include_once "../../../model/pdo.php";
    include_once "../../../model/functions.php";
    session_start();

    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){

        // Verifie si tout les inputs du formulaire ne sont pas vides
        if(!empty($_POST["question"]) && !empty($_POST["goodResponse"]) && !empty($_POST["badResponse"]) && !empty($_POST["badResponse2"]) && !empty($_POST["badResponse3"])){
            try {
                $questionData = [$_POST["question"], 3]; // [$_POST["question"], 2] changer le dernier numero selon l'id du quiz
                $sql = "INSERT INTO question (question_content, id_quiz) VALUE (?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute($questionData);
                $id_question = $pdo->lastInsertId();
            } catch (Exception $e) {
                echo("Une erreur s'est produite" . $e->getMessage());
            }
            // Boucle les reponses en filtrant la question
            foreach ($_POST as $key => $answer) {
                // On filtre la question
                if ($key !=  "question") {
                    // Condition si la clé est "goodResponse, la response aura 1 ce qui signifie true
                    if($key == "goodResponse"){
                        $dataResponse = [$answer, 1, $id_question, 3]; // [$answer, 1, $id_question, 2] changer le dernier chiffre selon l'id du quiz
                        // Condition inverse, badResponse, la response aura 0 ce qui signifie false
                    }else{
                        $dataResponse = [$answer, 0, $id_question, 3]; // [$answer, 0, $id_question, 2] changer le dernier chiffre selon l'id du quiz
                    }
                    // Essaye la requete d'insertion
                    try {
                        $sqlResponse = "INSERT INTO response (response_content, is_correct, id_question, id_quiz) VALUE (?,?,?,?)";
                        $stmtResponse = $pdo->prepare($sqlResponse);
                        $stmtResponse->execute($dataResponse);
                        alert("Question / Reponses créees", "success", "../../../view/admin/create_question_response.php");
                    } catch (Exception $e) {
                        // echo("error = " . $e->getMessage());
                        alert("Une erreur s'est produite", "failed", "../../../view/admin/create_question_response.php");
                    }
                }
            }
        }else{
            alert("Veuillez remplir tout les inputs pour créer une question et ses reponses", "failed", "../../../view/admin/create_question_response.php");
        }
    }else{
        header("Location:../home/home.php");
    }