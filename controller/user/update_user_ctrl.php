<?php
include_once "../../model/pdo.php";
include_once "../../model/functions.php";
session_start();

if(!empty($_POST["last_name"]) && !empty($_POST["first_name"]) && !empty($_POST["username"]) && !empty($_POST["mail"])){     
    $data = [$_POST["last_name"], $_POST["first_name"], $_POST["username"], $_POST["mail"], $_POST['id_user']];
    try{
        $sql = "UPDATE user SET last_name=?, first_name=?, username=?, mail=? WHERE id_user=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        alert("Vous avez reussi à modifier les informations de votre profil", "success", "../../view/user/update_user.php?id_user=$_SESSION[id_user]", true);
    }catch(PDOException $e){
        // echo("Une erreur est survenue => " . $e->getMessage());
        alert("Une erreur est survenue", "failed", "../../view/user/update_user.php?id_user=$_SESSION[id_user]", true);
    }
}else{
    alert("Veuillez remplir tout les champs", "failed", "../../view/user/update_user.php?id_user=$_SESSION[id_user]", true);
}