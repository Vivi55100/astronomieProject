<?php

if(isset($_GET["alert"]) && isset($_GET["state"]) && isset($_GET["page"])){
    // $alert est une variable dans laquelle j'injecte une chaine de caractere visible par les utilisateurs
    $alert = $_GET["alert"];
    // $state est une variable à laquelle j'attribut un état qui sera stylisée par du css
    $state = $_GET["state"];
    echo "<h2 class='$state text-center'>$alert</h2>";
}