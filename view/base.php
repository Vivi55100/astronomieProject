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
    include_once "../../model/pdo.php";

    if(isset($_GET['id_user'])){
      $id = $_GET["id_user"];
      $sql = "SELECT * FROM User WHERE id_user=$id";
      $stmt = $pdo->query($sql);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    session_start();
  ?>

  <nav class="navbar p-0">
    <div class="container-fluid p-0">
      <a href="../home/home.php">
        <img class="img-logo" src="../../assets/img/Logo-Without-Bg.png" alt="Logo du site">
      </a>
      <div class="welcome">
        <?php
          if(isset($_SESSION['name'])){
            echo "<h3>Bonjour $_SESSION[name]<h3/>";
          }else{
            echo "";
          }
        ?>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarNav" class="collapse navbar-collapse">
        <ul class="d-flex links navbar-nav">
          <!-- Je verifie que la session est bien set -->
          <?php if(isset($_SESSION["id_user"])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="../user/read_user.php?id_user=<?= $_SESSION['id_user'] ?>"><img class="p-0 m-0" src="../../assets/img/iconUser.png" alt="Icone Profil Utilisateur/trice"></a>
          </li>
          <?php } ?>
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
            <!-- Si un utilisateur n'est pas connecter, alors le lien connexion s'affiche et renvoie vers la page de connexion, si l'utilisateur est connecté,
              alors le lien de deconnexion s'affiche a la place du lien de connexion -->
            <li class="nav-item">
              <a href="../user/login.php" class="nav-link">Connexion</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a href="../../controller/user/logout.php" class="nav-link">Déconnexion</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>