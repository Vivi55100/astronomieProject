    <?php
        include_once "../base.php";
        
        if(isset($_SESSION["role"]) && ($_SESSION["role"]) == Role::ADMIN->value){
    ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Identifiant</th>
                <th>E-mail</th>
                <th>Rôle</th>
                <th>Supprimé le :</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $table = "";
                $sqlUser = "SELECT * FROM user";
                $stmtUser = $pdo->query($sqlUser);
                $users = $stmtUser->fetchAll(PDO::FETCH_ASSOC);
                if($users){
                    foreach($users as $user){
                        $table .= "<tr>";
                            $table .= "<td>" . htmlentities($user['last_name']) . "</td>";
                            $table .= "<td>" . htmlentities($user['first_name']) . "</td>";
                            $table .= "<td>" . htmlentities($user['username']) ."</td>";
                            $table .= "<td>" . htmlentities($user['mail']) ."</td>";
                            $table .= "<td>" . htmlentities($user['role']) . "</td>";
                            $table .= "<td>" . $user['delete_date'] . "</td>";
                        $table .="</tr>";
                    }
                    echo $table;
                }
            ?>
        </tbody>
    </table>
    <?php
        }else{
            header("Location:../../view/home/home.php"); // renvoie un utlisateur n'ayant pas les droits necessaires et qui chercherai à acceder à cette page en tapant le chemin d'acces dans l'url
        }
    ?>

    <!-- 
        Pour éviter que l'administrateur se mette un rôle inferieur
    < ?php if($user['role'] != Role::ADMIN->value){ ?>
    <label for="role">Rôle</label>
    <select class="form-control mb-3" name="role">
        < ?php
            $roles = ["Visiteur", "Inscrit", "Administrateur"];
            foreach($roles as $index => $role){            
                if($index == $user['role']){
                    echo "<option value='$index' selected>$role</option>";
                }else{
                    echo "<option value='$index'>$role</option>";
                }            
            }
        ?>
    </select>
    < ?php
        }else{
            echo '<input type="hidden" name="role" value=' . $user["role"] . '>';
        }
    ?>
     -->

</body>
</html>