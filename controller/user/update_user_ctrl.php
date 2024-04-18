<?php
include_once "../../model/pdo.php";

session_start();

if(!empty($_POST["last_name"]) && !empty($_POST["first_name"]) && !empty($_POST["username"]) && !empty($_POST["mail"])){
    $data = [$_POST["last_name"], $_POST["first_name"], $_POST["username"], $_POST["mail"], $_POST['avatar'], $_POST['id_user']];
    try{
        $sql = "UPDATE User SET last_name=?, first_name=?, username=?, mail=?, avatar=? WHERE id_user=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        echo "<h2 class='text-center'>La modification est reussie</h2>";
        header("Location:../../view/home/home.php");
    }catch(PDOException $e){
        echo "<h2 class='text-center'>La modification a échouée !</h2>" . $e->getMessage();
    }    
}else{
    echo "<h2 class='text-center'>Veuillez remplir correctement tout les champs requis !</h2>";
}