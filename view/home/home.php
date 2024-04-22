<?php
    include_once "./../base.php";
?>
<div class="homepage">
    <?php
        if($_SESSION){
            echo "<h1 class='text-center my-3 text-light'>Bienvenue " . $_SESSION['name'] . "</h1>";
        }else{
            echo "";
        }

        include_once "../alert.php";
    ?>
</div>

</body>
</html>