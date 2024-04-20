<?php
    include_once "../../model/pdo.php";
    include_once "../../model/functions.php";
    session_start();
if(
 !empty($_POST["last_name"]) &&
 !empty($_POST["first_name"]) &&
 !empty($_POST["username"]) &&
 !empty($_POST["password"]) &&
 !empty($_POST["mail"])
   ){
    try {
        $psw = password_hash($_POST["password"], PASSWORD_ARGON2I);
        $sql = "INSERT INTO User (last_name, first_name, username, password, mail, avatar, role, delete_date) VALUE (?,?,?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST["last_name"], $_POST["first_name"], $_POST["username"], $psw, $_POST["mail"], null, 1, null]);
        header("Location:../../view/home/home.php");
        alert("Location:../../view/home/home.php", "success", "Succes vous avez reussi votre inscription");
    } catch (PDOException $e) {
        // mon echo me permet de detecter l'/les erreur(s) que l'exception me renvoie
        // echo "Quelque chose qui s'est mal passé: ". $e->getMessage();
       alert("Location:../../view/user/create_user.php", "error", "Quelque chose qui s'est mal passé");
    }
}else{
    alert("Location:../../view/user/create_user.php", "error", "Veuillez remplir correctement le formulaire");
}