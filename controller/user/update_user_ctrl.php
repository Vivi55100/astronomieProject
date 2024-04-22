<?php
include_once "../../model/pdo.php";
include_once "../../config.php";
session_start();

if(!empty($_POST["last_name"]) && !empty($_POST["first_name"]) && !empty($_POST["username"]) && !empty($_POST["mail"])){

     // Vérification de la taille et du type du fichier
     if ($_FILES['avatar']['size'] > 0 && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        // $_FILES['avatar']['size'] > 0 : Vérifie si la taille du fichier téléchargé est supérieure à zéro.
        // $_FILES['avatar']['error'] === UPLOAD_ERR_OK : Vérifie s'il n'y a pas d'erreur lors du téléchargement du fichier.
        

        $file_tmp = $_FILES['avatar']['tmp_name'];
        // $file_tmp = $_FILES['avatar']['tmp_name'] : Récupère le chemin temporaire du fichier téléchargé.
        var_dump("$ file_tmp chemin temporaire ▼", $file_tmp);

        $file_name = basename($_FILES['avatar']['name']);
        // $file_name = basename($_FILES['avatar']['name']) : Récupère le nom du fichier téléchargé.
        var_dump("$ file_name nom du fichier ▼", $file_name);

        $upload_dir = UPLOAD_DIR;
        // $upload_dir = "assets/img/upload/" : Définit le répertoire de destination où le fichier sera déplacé après le téléchargement.
        var_dump("$ upload_dir destination où le fichier sera déplacé ▼", $upload_dir);

        // Déplacement du fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            // move_uploaded_file($file_tmp, $upload_dir . $file_name) : Déplace le fichier téléchargé du répertoire temporaire vers le répertoire de destination spécifié.

            $avatar_path = "assets/img/upload/" . $file_name;
            // $avatar_path = $upload_dir . $file_name : Concatène le chemin du répertoire de destination avec le nom du fichier pour obtenir le chemin complet de l'avatar.
            var_dump("$ avatar_path : chemin du répertoire de destination avec le nom du fichier ▼", $avatar_path);

            // Récupérer la liste des fichiers dans le dossier "upload"
            $files = scandir($upload_dir);
            var_dump("$ files ▼", $files);

            // Supprimer uniquement l'avatar précédent
            if(isset($_SESSION['previous_avatar'][$_POST['id_user']])) {
                unlink($_SESSION['previous_avatar'][$_POST['id_user']]);
                unset($_SESSION['previous_avatar'][$_POST['id_user']]);
            }

            // Stocker le chemin de l'avatar actuel pour la prochaine fois
            $_SESSION['previous_avatar'][$_POST['id_user']] = $upload_dir . $file_name;
            var_dump("session previous avatar ▼", $_SESSION['previous_avatar']);
            var_dump("session user id ▼", $_POST['id_user']);
            var_dump("$ _SESSION['previous_avatar'][$ _POST['id_user']] ▼", $_SESSION['previous_avatar'][$_POST['id_user']]);

            // Parcourir la liste des fichiers
            // foreach ($files as $file) {
            //     // Vérifier si le fichier est un fichier d'image et s'il n'est pas l'avatar actuel
            //     if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']) && $file !== $file_name) {
            //         // Supprimer le fichier inutile
            //         unlink($avatar_path . $file);
            //     }
            // }
        } else {
            echo "<h2 class='text-center'>Erreur lors du téléchargement de l'avatar.</h2>"; // Affiche un message d'erreur si le téléchargement du fichier a échoué.
            exit;
        }
    } else {
        echo "<h2 class='text-center'>Veuillez sélectionner un fichier d'avatar valide.</h2>"; // Affiche un message d'erreur si aucun fichier n'a été sélectionné ou si le fichier est invalide.
        exit;
    }
    $data = [$_POST["last_name"], $_POST["first_name"], $_POST["username"], $_POST["mail"], $avatar_path, $_POST['id_user']];
    try{
        $sql = "UPDATE user SET last_name=?, first_name=?, username=?, mail=?, avatar=? WHERE id_user=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        // Fermer la session pour la réouvrir plus tard afin de pouvoir "actualiser" la page sans avoir a se deconnecter et se reconnecter pour voir les changements
        unset($_SESSION["avatar"]);

        $userReset = $_SESSION["id_user"];
        $sqlReset = "SELECT avatar FROM user WHERE id_user=$userReset";
        $stmtReset = $pdo->query($sqlReset);
        $userReset = $stmtReset->fetch(PDO::FETCH_ASSOC);
        // Réattribuer la session pour "actualiser" la page et ainsi faire apparaitre l'avatar sans devoir quitter la session
        $_SESSION["avatar"] = $userReset["avatar"];
        echo "<h2 class='text-center'>La modification est reussie</h2>";
        //header("Location:../../view/home/home.php");
    }catch(PDOException $e){
        echo "<h2 class='text-center'>La modification a échouée !</h2>" . $e->getMessage();
    }
}else{
    echo "<h2 class='text-center'>Veuillez remplir correctement tout les champs requis !</h2>";
}