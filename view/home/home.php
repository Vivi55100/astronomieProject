<?php
    include_once "./../base.php";
    include_once "../../model/role.php";
?>
<div class="homepage">
    <?php
        if(!isset($_SESSION['role'])){
            echo "<p class='text-center pt-3'>Bonjour et bienvenue sur mon site sur l'Astronomie, pour accéder aux quiz veuillez vous connecter. Merci de votre visite !</p>";
        }
    ?>
    
</div>

</body>
</html>