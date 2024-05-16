<?php
    include_once "../../model/pdo.php";
    include_once "../../model/functions.php";
    include_once "../../config.php";
    session_start();

if(
 !empty($_POST["last_name"]) &&
 !empty($_POST["first_name"]) &&
 !empty($_POST["username"]) &&
 !empty($_POST["password"]) &&
 !empty($_POST["mail"])){

    $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\/-_:;,)[A-Za-z\d@$!%*?&\/-_:;,]{8,20}$/";
    $checkPsw = $_POST["password"];

    if(!preg_match($regex, $checkPsw)){
        alert("Le mot de passe doit contenir au minimum 8 caractères au maximum 20 caractères, contenir une majuscule, une minuscule, un chiffre ainsi qu'un caractère spécial", "failed", "../../view/user/create_user.php");
    }else{
        try {
            $imgBaseAvatar = BASEAVATAR_DIR;
            $psw = password_hash($_POST["password"], PASSWORD_ARGON2I);
            $sql = "INSERT INTO user (last_name, first_name, username, password, mail, avatar, role, delete_date) VALUE (?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_POST["last_name"], $_POST["first_name"], $_POST["username"], $psw, $_POST["mail"], $imgBaseAvatar, 1, null]);
            alert("Vous avez créer votre compte", "success", "../../view/user/login.php");
        } catch (PDOException $e) {
           alert("Une erreur interne s'est produite", "failed", "../../view/user/create_user.php");
        }
    }
}else{
    alert("Veuillez remplir tous les champs requis", "failed", "../../view/user/create_user.php");
}