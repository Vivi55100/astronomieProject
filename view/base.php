<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script defer src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="../../js/main.js"></script>
    <title>NavBar</title>
</head>
<body>

  <?php
    //session_start();
  ?>

  <nav class="navbar p-0">
    <div id="whatever1" class="container-fluid p-0">
      <a id="whatever" href="../home/home.php">
        <img class="img-logo" src="../../assets/img/Logo-Without-Bg.png" alt="Logo du site">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarNav" class="collapse navbar-collapse">
        <ul class="d-flex links navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../astre/astre.php">Astre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../quiz/quiz.php">Quiz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../mission/mission.php">Missions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../thanks/special_thanks.php">Remerciements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../proposition/proposition_astre.php">Proposition Astre</a>
          </li>
          <?php if(!isset($_SESSION['name'])){ ?>
            <li class="nav-item">
              <a href="../user/login.php" class="nav-link">Connexion</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a href="../controller/logout.php" class="nav-link">Déconnexion</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="../user/read_user.php"><img class="p-0 m-0" src="../../assets/img/iconUser.png" alt="Icone Profil Utilisateur/trice"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>