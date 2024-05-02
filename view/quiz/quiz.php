<?php
    include_once "../../model/role.php";
    include_once "../base.php";
    if ($_SESSION['role'] >= Role::LOGGED->value){
        $id_quiz = $_GET['id_quiz'];

        function array_shuff(&$array) {
            $keys = array_keys($array);
            shuffle($keys);
            foreach ($keys as $key) {
                $new[$key] = $array[$key];
            }
            $array = $new;
            return true;
        }
?>

<a class="btn btn-primary my-2" href="view/quiz/indexQuiz.php">Retour index quiz</a>

<div class="quizGame container-fluid d-flex flex-column">
    <div class="quizQuestion d-flex justify-content-center align-items-center">
        <?php
            
        // requete de gros batard
            $quizQuestionSql = 
            "SELECT quiz.id_quiz, quiz.quiz_name, question.id_question, question.question_content /* , GROUP_CONCAT(response.response_content SEPARATOR '_' )*/
            -- AS answers_name, GROUP_CONCAT(response.is_correct SEPARATOR '_')
            -- AS answers_value
            FROM quiz
            INNER JOIN question
            ON quiz.id_quiz = question.id_quiz
            -- INNER JOIN response
            -- ON question.id_question = response.id_question 
            WHERE quiz.id_quiz = $id_quiz
            GROUP BY question.id_question";


            $quizQuestionStmt = $pdo->query($quizQuestionSql);
            $quizQuestions = $quizQuestionStmt->fetchAll(PDO::FETCH_ASSOC);
            $newQuizQuestions = [];

            
            foreach ($quizQuestions as $id_question) {
                $idQ = $id_question['id_question'];
                // var_dump($idQ);
                $sqlAnswer = "SELECT * FROM response WHERE id_question = $idQ";
                $stmtAnswer = $pdo->query($sqlAnswer);
                $answers = $stmtAnswer->fetchAll(PDO::FETCH_ASSOC);
                echo $id_question['question_content'] . "<br>" . $answers;
            }
            // var_dump($answers);

            // foreach ($sqlResponses as $sqlResponse) {
            //     $sqlResponse = "SELECT * FROM response WHERE id_question = ";
            // }

            // Apres la requete ci-dessus, je souhaite recuperer afficher aleatoirement une question a la fois
            // $randQuestion = rand(0, count($quizQuestions) - 1);
            // On va traiter les données qui arrivent en string à cause de la concatenation

            // foreach ($quizQuestions as $qq) {

            //     $tempArray = [];
            //     $tempArray['id_quiz'] = $qq['id_quiz'];
            //     $tempArray['quiz_name'] = $qq['quiz_name'];
            //     $tempArray['id_question'] = $qq['id_question'];
            //     $tempArray['question_content'] = $qq['question_content'];
            //     $tempArrayName = explode('_', $qq['answers_name']);
            //     $tempArrayValue = explode('_', $qq['answers_value']);     

            //         // var_dump($name);
            //         foreach($tempArrayName as $index => $name){
            //             // var_dump($value);
            //             $tempArray["answers"][$name] = $tempArrayValue[$index];
            //         }
                
            //     $newQuizQuestions[] = $tempArray;
            //     $tempArray = [];
            // }

            // foreach ($newQuizQuestions as $question) {
            //     $q = $question["answers"];
            //     unset($question["answers"]);
            //     array_shuff($q);
            //     $question["answers"] = $q;
            // }
            //array_shuff($newQuizQuestions[0]["answers"]);
            // $newQuizQuestions[0]["answers"] = $p;
            //shuffle($newQuizQuestions);
            var_dump($newQuizQuestions);
        ?>
        <h4 id="quizQuestionContent">
            <?php
                // var_dump($newQuizQuestions[0]);
                // foreach ($newQuizQuestions as $question) {
                //     echo "<p>$question[question_content]</p>";
                // }
            ?>

        </h4>
    </div>
    <div class="quizResponse d-flex"></div>
</div>



<script>
     document.body.style.overflowY = 'scroll';
</script>
</body>
</html>
<?php } ?>