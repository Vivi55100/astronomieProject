<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    if ($_SESSION['role'] >= Role::LOGGED->value){
?>
    <a class="btn btn-primary my-2 mx-3" href="view/quiz/indexQuiz.php"> <!-- Redirection link transformed into a button -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
        </svg>
    </a> 

    <div class="quizGame container d-flex flex-column" id="quizGame">

        <div class="quizQuestion d-flex justify-content-center align-items-center mt-3" id="quizQuestion"></div>

        <div class="quizResponse d-flex justify-content-center align-items-center" id="quizResponse"></div>

        <div class="nextQuestion d-flex justify-content-center align-items-center mt-3" id="nextQuestion"></div>

    </div>

<script>
    document.body.style.overflowY = 'scroll';
    const quizQuestion = document.getElementById('quizQuestion')
    const quizResponse = document.getElementById('quizResponse')
    const nextQuestion = document.getElementById('nextQuestion')
    const quizGame = document.getElementById('quizGame')
    const queryString = window.location.search
    const urlParams = new URLSearchParams(queryString)

    let questions = []
    let response = []
    let score = 0
    let idQuiz = urlParams.get("id_quiz")
    //console.log("idQuiz = ", idQuiz)


    document.addEventListener("DOMContentLoaded", function (){
        const formData = new FormData()
        formData.append("id_quiz", idQuiz)

        const data = {
            method : "POST",
            body : formData
        }

        fetch("../../controller/admin/quiz/quiz_ctrl.php", data)
        .then(response => response.json())
        .then(quiz => {
            //console.log("quiz = ", quiz)
            questions = [...quiz] // With the spread operator, we copy the array from the database into another array (cloning)
            // console.log(" question[0] : ", questions[0].question_content)

            questionMaker(questions)
        })
    })

    function questionMaker(questions) {
        //console.log("questions : ", questions)
        if(questions.length > 0){
            nextQuestion.innerHTML = ""
            let showQuestions = `<h2 class='questionContent'>${questions[0].question_content}</h2>`
            quizQuestion.innerHTML = showQuestions

            let showResponses = "<form id='formValidation'>"
            for (const res in questions[0].answers) {
                //console.log(`response : ${res} => value : ${questions[0].answers[res]}`)
                showResponses += `<input class='response col-2 text-center ' type='radio' name='response'  value='${questions[0].answers[res]}'><label class='my-2 col-10 text-center' for='response'>${res}</label>` // To prevent cheating, we encapsulate it within a variable inside the input element
            }
            showResponses += `<div class="text-center mt-3"><input type="submit" class="btn btn-info w-50" id="btnValidation" value="Valider"></div>`
            showResponses += "</form>"

            quizResponse.innerHTML = showResponses

            const form = document.getElementById('formValidation') // We retrieve the form here because before, the form did not exist in the DOM (the promise creates it instantly)
            const btnSubmit = document.getElementById('btnValidation')

            form.addEventListener("submit", function(e){
                e.preventDefault()

                const formData = new FormData(e.target)
                const data = {
                    method : "POST",
                    body : formData
                }
                fetch("../../controller/admin/quiz/check_responses_ctrl.php", data)
                .then(response => response.json())
                .then(checkData => {
                    //console.log("checkData = ", checkData)
                    const responseInputs = document.querySelectorAll(".response")
                    if(checkData){
                        //console.log("checkData = ", checkData)
                        score++ // Here, we increase the score by 1
                        // Here, we have answered correctly. The correct answer is highlighted in green, while incorrect ones are highlighted in red
                        
                        //console.log("response inputs : ", responseInputs)
                        responseInputs.forEach(input => {
                            //console.log('input next . ', input.nextSibling)
                            if(input.checked){
                                input.nextSibling.style.color = "chartreuse" // nextSibling allows us to retrieve the next adjacent element (in this case, the label) so that we can color it
                                input.nextSibling.innerHTML += ' - Bonne réponse'
                            }else{
                                input.nextSibling.style.color = "red"
                                input.nextSibling.innerHTML += ' - Mauvaise réponse'
                            }
                        })
                    }else{

                       let idQuestion = questions[0].id_question

                       const formData = new FormData()
                       formData.append("id_question", idQuestion)
                        const data = {
                            method : "POST",
                            body : formData
                        }
                        fetch("../../controller/admin/quiz/error_response_ctrl.php", data)
                        .then(response => response.json())
                        .then(question => {
                            //console.log("question = ", question)
                            let goodId = question.id_response
                            //console.log("goodId = ", goodId)

                            responseInputs.forEach(input => {
                            //console.log('input next . ', input.nextSibling)
                                if(input.value == goodId){
                                    input.nextSibling.innerHTML += ' - Bonne réponse'
                                }else{
                                    input.nextSibling.style.color = "red"
                                    input.nextSibling.innerHTML += ' - Mauvaise réponse'
                                }
                            })
                        })
                    }

                    btnSubmit.remove()
                    //console.log("score = ", score)
                    nextQuestion.innerHTML = "<button class='btn btn-primary' id='btnNextQuestion'>Question suivante</button>"

                    const btnNextQuestion = document.getElementById('btnNextQuestion')

                    btnNextQuestion.addEventListener('click', function() {
                        questions.shift() // Remove the first element of the array and shift the indexes accordingly (ex: index 1 becomes index 0)
                        questionMaker(questions) // Reminder of the function questionMaker, which becomes a recursive function (a function that calls itself)
                    })
                })
            })
        }else{
            // Code for end of quiz
            quizGame.innerHTML = ""
            if(score <= 9){
                quizGame.innerHTML += "<h2 class='text-center'>Votre score est de " + score + " Vous avez eu un petit score</h2>"
            }
            if(score >= 10 && score <= 19){
                quizGame.innerHTML += "<h2 class='text-center'>Votre score est de " + score + " Vous avez eu un score moyen</h2>"
            }
            if(score >= 20 && score <= 29){
                quizGame.innerHTML += "<h2 class='text-center'>Votre score est de " + score + " Vous avez eu un bon score</h2>"
            }
            if(score >= 30 && score <= 39){
                quizGame.innerHTML += "<h2 class='text-center'>Votre score est de " + score + " Vous avez eu tres bon score</h2>"
            }
            if(score == 40){
                quizGame.innerHTML += "<h2 class='text-center'>Votre score est de " + score + " 20/20 Vous êtes excellent!!!</h2>"
            }
        }
    }

    // switch (score) {
    //             case (score <= 7):
    //                 quizGame.innerHTML += "<h2 class='text-center'>Votre score est de " + score + " Vous avez eu un passable</h2>"
    //                 break;

    //             case (score >= 8 && score <= 11):
    //                 quizGame.innerHTML += "<h2 class='text-center'>Votre score est de " + score + " Vous avez eu un score moyen</h2>"
    //                 break;

    //             case (score >= 12 && score <= 14):
    //                 quizGame.innerHTML += "<h2 class='text-center'>Votre score est de " + score + " Vous avez eu un bon score</h2>"
    //                 break;

    //             case (score >= 15 && score <= 19):
    //                 quizGame.innerHTML += "<h2 class='text-center'>Votre score est de " + score + " Vous avez eu tres bon score</h2>"
    //                 break;

    //             case (score == 20):
    //                 quizGame.innerHTML += "<h2 class='text-center'>Votre score est de " + score + " 20/20 Vous êtes excellent !!!</h2>"
    //                 break;

    //             default:
    //                 break;
    //         }
</script>
</body>
</html>
<?php 
    }else{
        header('Location:../home/home.php');
    } 
?>