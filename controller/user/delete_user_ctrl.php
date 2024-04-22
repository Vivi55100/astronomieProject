<?php

include_once "../../model/pdo.php";
include_once "../../model/functions.php";
session_start();

if (isset($_GET['id_user']) && $_GET['delete_date'] != null){
    try{
        $id = $_GET['id_user'];
        $sql = "UPDATE user WHERE delete_date=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([true, $id]);
        alert("success", "Vous avez supprimer votre compte");
    }catch(Exception $e){
        alert("error", "Une erreur est survenue");
    }
}