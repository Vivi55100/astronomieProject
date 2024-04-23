<?php

session_start();

/*
    Recuperer l'addresse de l'ancien image pour pouvoir la supprimer

    Recuperer les donnée du $_FILES
    
    Recuperer l'extension (jpg , png ...)

    Faire un tableau de tout les types de fichiers

    Verifier que le type du fichier recuperé a le bon type d'extension sinon erreur

    Verifier la taille du fichier

    Renommer le fichier en hash (sha, md5)

    Inserer dans la base de donnée
    (si tout c'est bien passer if(blabla){unset l'ancien image})
*/

