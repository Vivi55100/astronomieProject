<?php

/**
 * Cette fonction me permet de renvoyer dans l'url, l'état et l'alerte selon les conditions d'utilisations.
 * Je nomme ma fonction alert,
 * Cette fonction prend 3 parametres: l'url, l'état, l'alerte qui sont toutes les 3 des chaines de caracteres.
 * Grace à la fonction header(), j'implémente l'url dans le 1er parametre de la fonction header(),
 * J'implemente aussi l'état et le message d'alerte dans le 2eme parametre de la fonction header(),
 * exit pour fermer la fonction
 */
function alert(string $url, string $state, string $alert) : void{
    header("Location:$url" . "state=$state&alert=$alert");
    exit;
}