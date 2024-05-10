<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    include_once "../../model/pdo.php";
    
    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){
?>

<div class="responsesIdQuiz1">
    <h3 class="text-center">Reponses Quiz Facile</h3>
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
                $sql = "SELECT * FROM response WHERE id_quiz = 1";
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
</div>

<div class="responsesIdQuiz2">
    <h3 class="text-center">Reponses Quiz Moyen</h3>
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
                $sql = "SELECT * FROM response WHERE id_quiz = 2";
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
</div>

<div class="responsesIdQuiz3">
    <h3 class="text-center">Reponses Quiz Difficile</h3>
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
                $sql = "SELECT * FROM response WHERE id_quiz = 3";
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