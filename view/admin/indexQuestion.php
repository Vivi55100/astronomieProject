<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    include_once "../../model/pdo.php";
    
    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){
?>

<div class="questionIdQuiz1">
    <h3 class="text-center">Question de niveau Facile</h3>
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
                $sql = "SELECT * FROM question WHERE id_quiz = 1";
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
</div>

<div class="questionIdQuiz2">
    <h3 class="text-center">Question de niveau Moyen</h3>
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
                $sql = "SELECT * FROM question WHERE id_quiz = 2";
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
</div>

<div class="questionIdQuiz3">
    <h3 class="text-center">Question de niveau Difficile</h3>
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
                $sql = "SELECT * FROM question WHERE id_quiz = 3";
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
</div>

    


<script>
    document.body.style.overflowY = 'scroll';
</script>
</body>
</html>
<?php
    }else{
        header("Location:../home/home.php");
    }
?>