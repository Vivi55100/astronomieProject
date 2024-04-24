<?php

session_start();
include_once "../../model/pdo.php";

/*
    Recuperer l'addresse de l'ancienne image pour pouvoir la supprimer ✅

    Recuperer les données du $_FILES ✅
    
    Recuperer l'extension (jpg , png ...)

    Faire un tableau de tout les types de fichiers

    Verifier que le type du fichier recuperé a le bon type d'extension sinon erreur

    Verifier la taille du fichier

    Renommer le fichier en hash (sha, md5)

    Inserer dans la base de donnée
    (si tout c'est bien passer if(blabla){unset l'ancienne image})
*/

$userSession = $_SESSION;
var_dump("$ user session : ", $userSession, "<br><br>");

$oldAvatar = $_SESSION['avatar'];
var_dump("old avatar = ", $oldAvatar, "<br><br>");

$avatarDataFile = $_FILES['avatar'];
var_dump("avatar data file = ", $avatarDataFile, "<br><br>");

$avatarName = $_FILES['avatar']['name'];
var_dump('$ avatar name =  files name : ', $avatarName, "<br><br>");

$avatarFullPath = $_FILES['avatar']['full_path'];
var_dump('$ avatar full path : ', $avatarFullPath, "<br><br>");

$avatarTmpName = $_FILES['avatar']['tmp_name'];
var_dump('$ avatar tmp Name : ', $avatarTmpName, "<br><br>");

$avatarSize = $_FILES['avatar']['size'];
var_dump('$ avatar size: ', $avatarSize, "<br><br>");

$avatarError = $_FILES['avatar']['error'];
var_dump('$ avatar error  : ', $avatarError, "<br><br>");