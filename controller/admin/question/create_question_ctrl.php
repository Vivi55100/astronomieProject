<?php
    include_once "../../../model/role.php";
    include_once "../../../model/pdo.php";
    include_once "../../../model/functions.php";
    session_start();

    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){
        if(!empty($_POST["question"])){
            try {
                $data = [$_POST["question"], 1];
                $sql = "INSERT INTO question (question_content, id_difficulty) VALUE (?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute($data);
                header("Location:../../../view/admin/create_question.php");
            } catch (Exception $e) {
                alert("error", "Une erreur s'est produite" . $e->getMessage());
            }
        }else{
            alert("error", "Il faut remplir l'input pour pouvoir créer une question");
        }
    }else{
        header("Location:../home/home.php");
    }