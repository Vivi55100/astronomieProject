<?php 

// role 0 (Visiteur)=> Accès a la page d'accueil ainsi que la page Astres possibilité de se créer un compte pour s'inscrire.
// role 1 (Inscrit)=> Accès a la page d'accueil, la page Astres, faire des propositions d'astres, accès au quiz, soumettre des commentaires.
// role 2 (Administrateur)=> Accès à tout.

// l'enum donne une substance aux valeurs numeriques

enum Role : int
{
    case GUEST = 0;
    case LOGGED = 1;
    case ADMIN = 2;
}