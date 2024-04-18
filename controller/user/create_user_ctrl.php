<?php
    include_once "../../model/pdo.php";

if(
 !empty($_POST["last_name"]) &&
 !empty($_POST["first_name"]) &&
 !empty($_POST["username"]) &&
 !empty($_POST["password"]) &&
 !empty($_POST["mail"])
   ){
    try {
        $psw = password_hash($_POST["password"], PASSWORD_ARGON2I);
        $sql = "INSERT INTO User (last_name, first_name, username, password, mail, avatar, role) VALUE (?,?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST["last_name"], $_POST["first_name"], $_POST["username"], $psw, $_POST["mail"], null, 2]);
        echo "Succes vous avez reussi la creation de votre utilisateur";
    } catch (PDOException $e) {
        // mon echo me permet de detecter l'/les erreur(s) que l'exception me renvoie
        //echo "Il y'a quelque chose qui s'est mal passé: ". $e->getMessage();
       header("Location:../../view/home/home.php");
    }
}else{
    echo "Veuillez remplir correctement le formulaire";
}