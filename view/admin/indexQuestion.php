<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    include_once "../../model/pdo.php";
    
    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){
?>

<table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question content</th>
                <th>Id_quiz</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $table = "";
                $sql = "SELECT * FROM question";
                $stmt = $pdo->query($sql);
                $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if($questions){
                    foreach($questions as $question){
                        $table .= "<tr>";
                            $table .= "<td>" . htmlentities($question['id_question']) . "</td>";
                            $table .= "<td>" . htmlentities($question['question_content']) . "</td>";
                            $table .= "<td>" . htmlentities($question['id_quiz']) ."</td>";
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