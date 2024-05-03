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
        $imgBaseAvatar = "assets/img/static/iconUser.png"; // Est une variable contenant une chaine de caractere representant le chemin d'acces de l'avatar de base
        $psw = password_hash($_POST["password"], PASSWORD_ARGON2I);
        $sql = "INSERT INTO user (last_name, first_name, username, password, mail, avatar, role, delete_date) VALUE (?,?,?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST["last_name"], $_POST["first_name"], $_POST["username"], $psw, $_POST["mail"], $imgBaseAvatar, 1, null]);
        alert("Vous avez créer votre compte", "success", "../../view/user/login.php");
    } catch (PDOException $e) {
       alert("Une erreur interne s'est produite", "failed", "../../view/user/create_user.php");
    }
}else{
    alert("Veuillez remplir tous les champs requis", "failed", "../../view/user/create_user.php");
}