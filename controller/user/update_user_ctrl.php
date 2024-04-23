<?php
include_once "../../model/pdo.php";
include_once "../../config.php";
session_start();

if(!empty($_POST["last_name"]) && !empty($_POST["first_name"]) && !empty($_POST["username"]) && !empty($_POST["mail"])){
    // Si un avatar ayant un nom temporaire est attribué 
     
    $data = [$_POST["last_name"], $_POST["first_name"], $_POST["username"], $_POST["mail"], $_POST['id_user']];
    try{
        $sql = "UPDATE user SET last_name=?, first_name=?, username=?, mail=? WHERE id_user=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        header("Location:../../view/home/home.php");
    }catch(PDOException $e){
        echo "<h2 class='text-center'>La modification a échouée !</h2>" . $e->getMessage();
    }
}else{
    echo "<h2 class='text-center'>Veuillez remplir correctement tout les champs requis !</h2>";
}