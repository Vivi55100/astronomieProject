<?php
    include_once "../../model/role.php";
    include_once "../base.php";
    if ($_SESSION['role'] >= Role::LOGGED->value){
?>

</body>
</html>
<?php } ?>