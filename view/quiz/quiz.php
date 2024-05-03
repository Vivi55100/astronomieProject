<?php
// Include necessary files to retrieve roles and for database connection
    include_once "../../model/role.php"; // Inclusion of the Role class to manage roles
    include_once "../base.php"; // Inclusion of the file for database connection

     // Verification of the role of the connected user.
    if ($_SESSION['role'] >= Role::LOGGED->value){ // Check if the user's role is greater than or equal to the 'LOGGED' role
        $id_quiz = $_GET['id_quiz']; // Retrieval of the quiz identifier from the URL parameters
?>

 <a class="btn btn-primary my-2" href="view/quiz/indexQuiz.php">Retour index quiz</a> <!-- Redirection link transformed into a button -->

<div class="quizGame container-fluid d-flex flex-column">
    <div class="quizQuestion d-flex justify-content-center align-items-center">
        <?php
        // SQL query to retrieve the questions and associated responses for the specified quiz
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

            // Execution of the SQL query and retrieval of results
            $quizQuestionStmt = $pdo->query($quizQuestionSql); // Execution of the SQL query
            $quizQuestions = $quizQuestionStmt->fetchAll(PDO::FETCH_ASSOC); // Retrieval of the query results
            $newQuizQuestions = []; // Initialization of an array to store the new questions

            // Loop through the results to create an array of questions with shuffled answers
            foreach ($quizQuestions as $qq) {
                $tempArray = []; // Initialization of a temporary array to store the data of each question
                $tempArray['id_quiz'] = $qq['id_quiz']; // Retrieval of the quiz ID
                $tempArray['quiz_name'] = $qq['quiz_name']; // Retrieval of the quiz name
                $tempArray['id_question'] = $qq['id_question']; // Retrieval of the question ID
                $tempArray['question_content'] = $qq['question_content']; // Retrieval of the question content
                $tempArrayName = explode('_', $qq['answers_name']); // Separation of answer names
                $tempArrayValue = explode('_', $qq['answers_value']); // Separation of answer values

                // Randomly shuffles the answers for each question
                for ($i=0; $i <= 3 ; $i++) { // Loop to shuffle the answers
                    $rnd = count($tempArrayName) > 1 ? rand(0, count($tempArrayName) - 1) : 0; // Random selection of an answer
                    $tempArray["answers"][$tempArrayName[$rnd]] = $tempArrayValue[$rnd]; // Assignment of the answer to the temporary array
                    array_splice($tempArrayName, $rnd, 1); // Removal of the selected answer from the array of names
                    array_splice($tempArrayValue, $rnd, 1); // Removal of the selected value from the array of values
                }

                $newQuizQuestions[] = $tempArray; // Addition of the shuffled question to the array of new questions
                $tempArray = []; // Resetting the temporary array for the next iteration
            }
            // Random shuffling of the questions in the array
            shuffle($newQuizQuestions); // Random shuffling of the array of new questions
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
<?php 
    }else{
        header('Location:../home/home.php');
    } 
?>