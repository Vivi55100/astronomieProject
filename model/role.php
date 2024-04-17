<?php 

// role 0 (visiteur)=> Accès a la page d'accueil ainsi que la page Astres.
// role 1 (connecté)=> Accès a la page d'accueil, la page Astres, faire des propositions d'astres, accès au quiz.
// role 2 (admin)=> Accès à tout.

enum Role : int
{
    case GUEST = 0;
    case LOGGED = 1;
    case ADMIN = 2;
}