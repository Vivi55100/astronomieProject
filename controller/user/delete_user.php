<?php

include_once "../../model/pdo.php";
include_once "../../model/functions.php";
session_start();

date_default_timezone_set('Europe/Paris');

if (isset($_GET['id_user'])){
    try{
        $id = $_GET['id_user'];
        $delete_at = new DateTime();
        $delete_date = $delete_at->format("Y-m-d H:i:s");
        $sql = "UPDATE user SET delete_date=? WHERE id_user=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$delete_date, $id]);
        alert("success", "Vous avez supprimer votre compte");
        if(isset($_SESSION["id_user"])){
            $id_user = $_GET['id_user'];
            $sql_check_delete = "SELECT * FROM user WHERE id_user=? AND delete_date IS NOT NULL";
            $stmt_check_delete = $pdo->prepare($sql_check_delete);
            $stmt_check_delete->execute([$id_user]);
            $deleted_user = $stmt_check_delete->fetch(PDO::FETCH_ASSOC);
            if ($deleted_user) {
                session_destroy();
                header("Location:../../view/home/home.php");
                exit();
            }
        }
    }catch(Exception $e){
        alert("error", "Une erreur est survenue");
    }
}