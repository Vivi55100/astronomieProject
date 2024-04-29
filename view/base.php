<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <base href="http://astronomieproject/">Windows base me permet de renseigner un chemin a partir de la racine, n'affecte pas le php mais seulement le HTML -->
    <base href="http://localhost/astronomieproject/"> <!-- Linux base -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="js/main.js"></script>
    <title>NavBar</title>
</head>
<body>

  <?php
    include_once "../../model/pdo.php";
    include_once "../../model/role.php";
    session_start();

    if(isset($_GET['id_user'])){
      $id = $_GET["id_user"];
      $sql = "SELECT * FROM user WHERE id_user=$id";
      $stmt = $pdo->query($sql);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }    
  ?>

  <nav class="navbar navbar-expand-xxl p-0 m-0">
    <div class="container-fluid">
      <a href="view/home/home.php">
        <img class="img-logo" src="assets/img/static/Logo-Without-Bg.png" alt="Logo du site">
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
        <span class="navbar-toggler-icon bg-light"></span>
      </button>
      <div id="navbarNav" class="collapse navbar-collapse">
        <ul class="container d-flex">
          <?php if(isset($_SESSION["id_user"])){ ?>
          <li class="profileButton nav-item">
            <a class="nav-link" href="view/user/read_user.php?id_user=<?= $_SESSION['id_user'] ?>">
              <img class="p-0 m-0" src="<?= $_SESSION["avatar"] ?>" alt="Avatar Profil Utilisateur/trice">
            </a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="view/astre/astre.php">Astre</a>
          </li>
          <!-- Si un user n'a pas de role suffisament élevé, les liens lui sont interdit, si un user a un role superieur il pourra acceder a ses liens -->
          <?php if(isset($_SESSION['role']) && ($_SESSION['role']) >= Role::LOGGED->value){ ?>
          <li class="nav-item">
            <a class="nav-link" href="view/quiz/quiz.php">Quiz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-lg-dark" href="view/mission/mission.php">Missions</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="view/thanks/special_thanks.php">Remerciements</a>
          </li>
          <?php if(isset($_SESSION['role']) && ($_SESSION['role']) >= Role::LOGGED->value){ ?>
          <li class="nav-item">
            <a class="nav-link" href="view/proposition/proposition_astre.php">Proposition Astre</a>
          </li>
          <?php } ?>
          <?php if(isset($_SESSION['role']) && ($_SESSION['role']) == Role::ADMIN->value){ ?>
          <li class="nav-item">
            <a class="nav-link" href="view/admin/indexAdmin.php">Gestion</a>
          </li>
          <?php } ?>
          <?php if(!isset($_SESSION['name'])){ ?>
            <!-- Si un utilisateur n'est pas connecté, alors le lien de connexion s'affiche et renvoie vers la page de connexion, si l'utilisateur est connecté,
              alors le lien de deconnexion s'affiche a la place du lien de connexion -->
            <li class="nav-item">
              <a href="view/user/login.php" class="nav-link">Connexion</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a href="controller/user/logout.php" class="nav-link">Déconnexion</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>