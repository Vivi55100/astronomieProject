<?php
    include_once "../../model/role.php";
    include_once "../base.php";
    if ($_SESSION['role'] >= Role::LOGGED->value){
        $id_quiz = $_GET['id_quiz'];

?>

<a class="btn btn-primary my-2" href="view/quiz/indexQuiz.php">Retour index quiz</a>

<div class="quizGame container-fluid d-flex flex-column">
    <div class="quizQuestion d-flex justify-content-center align-items-center">
        <?php
        
            $quizQuestionSql = 
            "SELECT quiz.id_quiz, quiz.quiz_name, question.id_question, question.question_content , GROUP_CONCAT(response.response_content SEPARATOR '_' )
            AS answers_name, GROUP_CONCAT(response.is_correct SEPARATOR '_')
            AS answers_value
            FROM quiz
            INNER JOIN question
            ON quiz.id_quiz = question.id_quiz
            INNER JOIN response
            ON question.id_question = response.id_question 
            WHERE quiz.id_quiz = $id_quiz
            GROUP BY question.id_question";

            $quizQuestionStmt = $pdo->query($quizQuestionSql);
            $quizQuestions = $quizQuestionStmt->fetchAll(PDO::FETCH_ASSOC);
            $newQuizQuestions = [];

            foreach ($quizQuestions as $qq) {
                $tempArray = [];
                $tempArray['id_quiz'] = $qq['id_quiz'];
                $tempArray['quiz_name'] = $qq['quiz_name'];
                $tempArray['id_question'] = $qq['id_question'];
                $tempArray['question_content'] = $qq['question_content'];
                $tempArrayName = explode('_', $qq['answers_name']);
                $tempArrayValue = explode('_', $qq['answers_value']);
                for ($i=0; $i <= 3 ; $i++) {
                    $rnd = count($tempArrayName) > 1 ? rand(0, count($tempArrayName) - 1) : 0;
                    $tempArray["answers"][$tempArrayName[$rnd]] = $tempArrayValue[$rnd];
                    array_splice($tempArrayName, $rnd, 1);
                    array_splice($tempArrayValue, $rnd, 1);
                }
                $newQuizQuestions[] = $tempArray;
                $tempArray = [];
            }
            shuffle($newQuizQuestions);
            var_dump($newQuizQuestions[0]);
        ?>
        <h4 id="quizQuestionContent"></h4>
    </div>
    <div class="quizResponse d-flex"></div>
</div>

<script>
     document.body.style.overflowY = 'scroll';
</script>
</body>
</html>
<?php } ?>