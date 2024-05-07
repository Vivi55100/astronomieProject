<?php

include_once "../../model/pdo.php";
include_once "../../model/functions.php";
include_once "../../model/role.php";
session_start();

date_default_timezone_set('Europe/Paris');
if($_SESSION['role'] >= Role::LOGGED->value){
    if (isset($_GET['id_user']) && isset($_GET["token"])){
        if($_GET["token"] === $_SESSION["token"]){
            try{
                $id = $_GET['id_user'];
                $delete_at = new DateTime();
                $delete_date = $delete_at->format("Y-m-d H:i:s");
                $sql = "UPDATE user SET delete_date=? WHERE id_user=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$delete_date, $id]);
                if(isset($_SESSION["id_user"])){
                    $id_user = $_GET['id_user'];
                    $sql_check_delete = "SELECT * FROM user WHERE id_user=? AND delete_date IS NOT NULL";
                    $stmt_check_delete = $pdo->prepare($sql_check_delete);
                    $stmt_check_delete->execute([$id_user]);
                    $deleted_user = $stmt_check_delete->fetch(PDO::FETCH_ASSOC);
                    if ($deleted_user) {
                        session_destroy();
                        alert("Succes vous avez supprimer votre compte", "success", "../../../view/user/login.php");
                        exit();
                    }
                }
            }catch(Exception $e){
                alert("Une erreur est survenue", "error", "../../../view/user/read_user.php?id_user=$_SESSION[id_user]");
            }
        }else{
            alert("Vous n'etes pas autorisé(e) à faire cette action", "error", "../../../view/user/read_user.php?id_user=$_SESSION[id_user]");
        }
    }else{
        echo "soucis de token ";
    }
}else{
    header("Location:../../view/home/home.php");
}