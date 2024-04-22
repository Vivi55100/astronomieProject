<?php
    include_once "../../model/pdo.php";
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
        // header("Location:../../view/home/home.php?id_user=$_GET[id_user]");
        header("Location:../../view/home/home.php?id_user=$_GET[id_user]");
    } catch (PDOException $e) {
        // mon echo me permet de detecter l'/les erreur(s) que l'exception me renvoie
        // echo "Quelque chose qui s'est mal passé: ". $e->getMessage();
       echo "<h1>Une erreur s'est produite : </h1>" . $e->getMessage();
    }
}else{
    echo "<h1>Veuillez remplir tous les champs requis</h1>";
}