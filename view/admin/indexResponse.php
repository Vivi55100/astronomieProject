<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    include_once "../../model/pdo.php";
    
    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){
?>

<table class="table table-striped">
        <thead>
            <tr>
                <th>ID Reponse</th>
                <th>Reponse</th>
                <th>Est correcte ?</th>
                <th>ID Question</th>
                <th>ID Quiz</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $table = "";
                $sql = "SELECT * FROM response";
                $stmt = $pdo->query($sql);
                $responses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if($responses){
                    foreach($responses as $response){
                        $table .= "<tr>";
                            $table .= "<td>" . htmlentities($response['id_response']) . "</td>";
                            $table .= "<td>" . htmlentities($response['response_content']) . "</td>";
                            $table .= "<td>" . htmlentities($response['is_correct']) ."</td>";
                            $table .= "<td>" . htmlentities($response['id_question']) ."</td>";
                            $table .= "<td>" . htmlentities($response['id_quiz']) ."</td>";
                        $table .="</tr>";
                    }
                    echo $table;
                }
            ?>
        </tbody>
    </table>

<?php
    }else{
        header("Location:../home/home.php");
    }
?>