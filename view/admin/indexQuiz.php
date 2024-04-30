<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    
    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Quiz</th>
                <th>Nom du Quiz</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $table = "";
                $sql = "SELECT * FROM quiz";
                $stmt = $pdo->query($sql);
                $quizz = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if($quizz){
                    foreach($quizz as $quiz){
                        $table .= "<tr>";
                            $table .= "<td>" . htmlentities($quiz['id_quiz']) . "</td>";
                            $table .= "<td>" . htmlentities($quiz['quiz_name']) . "</td>";
                        $table .="</tr>";
                    }
                    echo $table;
                }
            ?>
        </tbody>
    </table>

<script>
    document.body.style.overflowY = 'scroll';
</script>
<?php
    }else{
        header("Location:../home/home.php");
    }
?>