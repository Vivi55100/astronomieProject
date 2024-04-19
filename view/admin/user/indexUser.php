<?php
    include_once "../../../model/role.php";
    include_once "../../base.php";
    
    if(isset($_SESSION["role"]) && $_SESSION["role"] == Role::ADMIN->value){
?>

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Identifiant</th>
            <th>E-mail</th>
            <th>Rôle</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sqlUser = "SELECT COUNT(*) FROM User";
            $stmtUser = $pdo->query($sqlUser);
            $users = $stmtUser->fetch(PDO::FETCH_ASSOC);
            $roleArray = ["Visiteur", "Inscrit", "Administrateur"];
            if($users){
                foreach($users as $user){
                    $table .= "<tr>";
                    $table .= "<td>" . htmlentities($user['first_name']) . "</td>";
                    $table .= "<td>" . htmlentities($user['last_name']) . "</td>";
                    $table .= "<td>" . $roleArray[$user['role']] . "</td>";
                    $table .= "<td>
                                <a class='destroy-child' data-toggle='tooltip' data-placement='top' title='Information sur l utilisateur' href='view/users/read_users.php?id=$user[id_user]&page=$p'><img src='img/sauron_eye.png' width='2%'></a>
                                <a class='destroy-child bomb' data-bs-toggle='modal' data-bs-target='#validation_delete' data-link='controller/delete_ctrl_users.php?id=$user[id_user]&page=$p&token=$token' data-placement='top' title='Supprimer un utilisateur' href=''>💣</a>
                                <a class='destroy-child' target='_blank' data-toggle='tooltip' data-placement='top' title='Modifier un utilisateur' href='view/users/update_users.php?id=$user[id_user]&page=$p'>🧬</a>
                                <a class='destroy-child' target='_blank' data-toggle='tooltip' data-placement='top' title='Modifier un mot de passe' href='view/users/update_users_password.php?id=$user[id_user]&page=$p'><img src='img/padlock.png' width='2%'></a>
                            </td>";
                    $table .="</tr>";
                }
                echo $table;
            }
        ?>
    </tbody>
</table>
<?php
    }else{
        header("Location:../../home/home.php");
    }
?>