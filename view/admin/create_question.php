<?php
    include_once "../base.php";
    include_once "../../model/role.php";
    
    if($_SESSION["role"] && $_SESSION["role"] == Role::ADMIN->value){
?>

<h1>Formulaire de creation de questions</h1>

<form action="controller/admin/question/create_question_ctrl.php" method="post">
    <label for=""></label>
    <input type="text">
</form>


</body>
</html>
<?php
    }else{
        header("Location:../home/home.php");
    }
?>