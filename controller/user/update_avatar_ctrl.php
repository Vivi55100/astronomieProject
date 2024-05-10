<?php
include_once "../../model/pdo.php";
include_once "../../config.php";
include_once "../../model/functions.php";
session_start();


if($_SESSION['id_user']){ // Check if the user is logged in

    $avatarFullPath = $_FILES['avatar']['full_path']; // Retrieve the full path of the avatar from the form
    // var_dump('$ avatar full path : ', $avatarFullPath, "<br><br>");

    $avatarError = $_FILES['avatar']['error']; // Retrieve the error code of the avatar from the form
    // var_dump('$ avatar error  : ', $avatarError, "<br><br>");

    $extensionArray = ['jpg', 'jpeg', 'png', 'svg', 'webp', 'gif', 'avif']; // Define the allowed file extensions
    // var_dump("extension array : ", $extensionArray, "<br><br>");

    // Check if there are any files uploaded
    if( $_FILES ){    

        $avatarTmpName = $_FILES['avatar']['tmp_name']; // Retrieve the temporary name of the avatar from the form.
        // var_dump('$ avatar tmp Name : ', $avatarTmpName, "<br><br>");

        $avatarSize = $_FILES['avatar']['size']; // Retrieve the size of the avatar from the form
        // var_dump('$ avatar size: ', $avatarSize, "<br><br>");

        $fileName = $_FILES['avatar']['name']; // Retrieve the name of the avatar from the form
        // var_dump('$ file name : ', $fileName, "<br><br>");
        // Exemple ; pain.png
        // Exemple 2 : pain.au_chocolat.png
        // Exemple 3 : pain.PNg

        $explFileName = explode(".", $fileName); // Separate the filename and its extension
        // ["pain", "png"]
        // ["pain", "au_chocolat", "png"]

        $extension = end($extensionArray); // Retrieve the file extension

        if ( in_array(strtolower($extension), $extensionArray)){ // Check if the extension is allowed

            // Check if the size of the avatar is less than or equal to 1MB
            if ( $avatarSize <= 1048576 ){ // 1Mo en octets

                $new_name = uniqid("AVATAR_", true) . time() . "." . $extension; // Generate a unique name for the avatar by combining a unique identifier and a timestamp

                $uploadPath = AVATARUPLOAD_DIR; // Path where the avatar will be downloaded

                // Delete the old avatar if it's not the default one
                $baseAvatar = BASEAVATAR_DIR;
                if ( $baseAvatar != $_SESSION['avatar']){
                    $deleteAvatar = "../../" . $_SESSION['avatar'];
                    unset($deleteAvatar);
                }
                try{
                    $idUser = ($_POST["id_user"]); // Retrieve the user identifier from the POST form
                    $sqlNewAvatar = "UPDATE user SET avatar=? WHERE id_user=$idUser";  // Prepare the SQL query to update the avatar path in the database
                    $stmtNewAvatar = $pdo->prepare($sqlNewAvatar);
                    $avatarPathName = $uploadPath . $new_name;
                    
                    if($stmtNewAvatar->execute([$avatarPathName])){ // Execute the SQL query and move the uploaded avatar to the download directory.
                        if(move_uploaded_file($avatarTmpName, "../../" . $avatarPathName)){
                            alert("Vous avez reussi à modifier votre avatar", "success", "../../view/user/update_avatar.php?id_user=$_SESSION[id_user]", true);

                            //  Update the avatar path in the session
                            $_SESSION['avatar'] = $avatarPathName;
                        } else{
                            alert("Choisissez une image pour devenir votre avatar", "failed", "../../view/user/update_avatar.php?id_user=$_SESSION[id_user]", true);
                        }
                    }else{
                        alert("L'avatar n'est pas dans la base de données", "failed", "../../view/user/update_avatar.php?id_user=$_SESSION[id_user]", true);
                    }
                }catch (PDOException $e){
                    // echo "Problemes = " . $e->getMessage();
                    alert("Une erreur est survenue", "failed", "../../view/user/update_avatar.php?id_user=$_SESSION[id_user]", true);
                }
            } else {
                alert("Votre fichier est trop volumineux", "failed", "../../view/user/update_avatar.php?id_user=$_SESSION[id_user]", true);
            }
        } else {
            alert("Le type de fichier ne correspond pas", "failed", "../../view/user/update_avatar.php?id_user=$_SESSION[id_user]", true);
        }
    } else {
        alert("Veuilllez selectionner une image pour modifier votre avatar", "failed", "../../view/user/update_avatar.php?id_user=$_SESSION[id_user]", true);
    }
}else{
    header('Location:../../view/home/home.php');
}