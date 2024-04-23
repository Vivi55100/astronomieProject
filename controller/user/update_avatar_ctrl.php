<?php

session_start();
include_once "../../model/pdo.php";

/*
    Recuperer l'addresse de l'ancienne image pour pouvoir la supprimer ✅

    Recuperer les données du $_FILES
    
    Recuperer l'extension (jpg , png ...)

    Faire un tableau de tout les types de fichiers

    Verifier que le type du fichier recuperé a le bon type d'extension sinon erreur

    Verifier la taille du fichier

    Renommer le fichier en hash (sha, md5)

    Inserer dans la base de donnée
    (si tout c'est bien passer if(blabla){unset l'ancien image})
*/

$oldAvatar = $_SESSION['avatar'];
var_dump("old avatar = ", $oldAvatar, "<br>");

$dataFile = $_FILES['avatar'];
var_dump("data file = ", $dataFile, "<br>");