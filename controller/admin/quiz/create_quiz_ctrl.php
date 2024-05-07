<?php
    include_once "../../../model/role.php";
    include_once "../../../model/pdo.php";
    include_once "../../../model/functions.php";
    session_start();
    
    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){        
        if(!empty($_POST["quiz"])){
            try {
                $sql = "INSERT INTO quiz (quiz_name) VALUE (?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_POST["quiz"]]);
                header("Location:../../../view/admin/create_quiz.php");
            } catch (PDOException $e) {
                alert("Une erreur s'est produite", "error" . $e->getMessage(), "");
            }
        }else{
            alert("Il faut remplir le champs requis", "error", "");
        }
    }else{
        header("Location:../../../home/home.php");
    }