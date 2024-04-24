<?php

session_start();
include_once "../../model/pdo.php";

/*
    Recuperer l'addresse de l'ancienne image pour pouvoir la supprimer ✅

    Recuperer les données du $_FILES ✅
    
    Recuperer l'extension (jpg , png ...) ✅

    Faire un tableau de tout les types de fichiers ✅

    Verifier que le type du fichier recuperé a le bon type d'extension sinon erreur ✅

    Verifier la taille du fichier ✅

    Renommer le fichier en hash (sha1) ✅

    Inserer dans la base de donnée ✅
    (si tout c'est bien passer if(blabla){unset l'ancienne image})
*/

//$avatarDataFile = $_FILES['avatar']; // Recupere les données de l'avatar
//var_dump("avatar data file = ", $avatarDataFile, "<br><br>");

$avatarName = $_FILES['avatar']['name']; // Recuperer le nom de l'avatar
var_dump('$ avatar name =  files name : ', $avatarName, "<br><br>");

$avatarFullPath = $_FILES['avatar']['full_path']; // Recupere le chemin d'acces
var_dump('$ avatar full path : ', $avatarFullPath, "<br><br>");

$avatarTmpName = $_FILES['avatar']['tmp_name']; // Les données binaires d"un fichier
var_dump('$ avatar tmp Name : ', $avatarTmpName, "<br><br>");

$avatarSize = $_FILES['avatar']['size']; // Recupere la taille de l'avatar
var_dump('$ avatar size: ', $avatarSize, "<br><br>");

$avatarError = $_FILES['avatar']['error']; // Recupere une erreur
var_dump('$ avatar error  : ', $avatarError, "<br><br>");

$extensionArray = ['jpg', 'jpeg', 'png', 'svg', 'webp', 'gif', 'avif']; // Tableau de chaines de caracteres, je souhaite comparer plus tard les extensions
var_dump("extension array : ", $extensionArray, "<br><br>");

// $avatarMaxSize = 136; // Attribut une taille à l'avatar

if($_SESSION){
    if( $_FILES ){

        //$oldAvatar = $_SESSION['avatar']; // Recupere l'avatar de l'utlisateur en session
    
        $fileName = $_FILES['avatar']['name'];
        // Exemple ; cochon.png
        // exemple 2 : cochon.de_lait.png
        //exemple 3 : cohocn.PNg
        $explFileName = explode(".", $fileName); // Split 
        // ["cochon", "png"]
        // ["cochon", "de_lait", "png"]
        $extension = end($extensionArray);
    
        if ( in_array(strtolower($extension), $extensionArray)){
            
            if ( $avatarSize <= 1048576 ){ // 1Mo
                
                $new_name = uniqid() . time() . "." . $extension;
                
                $uploadPath = "assets/img/avatarUpload";
                
                if( !empty($_POST['avatar']) ){
                        
                    unset($_FILES);
                    
                    $newAvatar = $_POST['avatar'];
                    
                    $idUser = htmlentities($_GET["id_user"]);
                    
                    $sqlNewAvatar = "UPDATE user SET avatar=$newAvatar WHERE id_user=$idUser";
                    
                    $stmtNewAvatar = $pdo->prepare($sqlNewAvatar);
                    
                    $stmtNewAvatar->execute($newAvatar);

                    echo "Vous avez reussi à modifier votre avatar";
                    
                }
            } else {
                echo "wesh ton fichier est trop gros.";
            }
        } else {
            echo "Le type de fichier ne correspond pas ducon.";
        }
    } else {
        echo "Mes une putain d'image bordel de merde.";
    }
}else{
    echo "probleme tu dois etre connecter pour changer ton avatar";
}