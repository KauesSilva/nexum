<?php
require_once "login.php";

session_start();
// Verificando se o usuário está logado, se não, redireciona-o para o login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: form.php");
  exit();

  $stmt = $pdo->prepare(
    "SELECT ds_profilePath FROM tb_Usuario WHERE id_Usuario = '$id' "
  );
  $stmt->execute();
  $fetch = $stmt->fetch();
  $ds_profilePath = $fetch["ds_profilePath"];
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Nexum</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" type="text/css" href="../css/home.css?v=2" />
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico?v=2">
</head>

<body>
  <!-- Navbar -->
  <div class="sidebar">
    <div class="logo-details">
      <div class="logo_name">Nexum</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <i class='bx bx-search'></i>
        <input type="text" placeholder="Pesquisar...">
        <span class="tooltip">Buscar</span>
      </li>
      <li>
        <a href="home.php" class="navItem active">
          <i class='bx bx-grid-alt active'></i>
          <span class="links_name active">Projetos</span>
        </a>
        <span class="tooltip">Projetos</span>
      </li>
      <li>
        <a href="../php/profile.php" class="navItem">
          <i class='bx bx-user'></i>
          <span class="links_name">Usuário</span>
        </a>
        <span class="tooltip">Usuário</span>
      </li>
      <li>
        <a href="information.php" class="navItem">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Informações</span>
        </a>
        <span class="tooltip">Informações</span>
      </li>
      <li>
        <a href="#" onclick="errorConstruction()" class="navItem">
          <i class='bx bx-heart'></i>
          <span class="links_name">Favoritos</span>
        </a>
        <span class="tooltip">Favoritos</span>
      </li>
      <li>
        <a href="#" onclick="errorConstruction()" class="navItem">
          <i class='bx bx-cog'></i>
          <span class="links_name">Configurações</span>
        </a>
        <span class="tooltip">Configurações</span>
      </li>
      <li class="profile">
        <div class="profile-details">
          <img src="<?php echo $ds_profilePath; ?>" alt="profileImg">
          <div class="name_job">
            <div class="name">
              <?php
              require_once "login.php";
              $id = $_SESSION["id_Usuario"];
              $stmt = $pdo->prepare(
                "SELECT nm_Usuario FROM tb_Usuario WHERE id_Usuario = '$id' "
              );
              $stmt->execute();
              $fetch = $stmt->fetch();
              echo $fetch["nm_Usuario"];
              ?>
            </div>
            <div class="job">
              <?php
              require_once "login.php";
              echo $_SESSION["ds_Email"];
              ?>
            </div>
          </div>
        </div>
        <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
      </li>
    </ul>
  </div>
  <div class="container-flex collumn">
    <div class="card">
      <div class="card-header">
        <img src="../assets/templates/cover-img/template01.png" alt="" />
      </div>
      <div class="card-body">
        <span class="tag tag-teal">Fome</span>
        <h4><?php
            $stmt = $pdo->prepare(
              "SELECT ds_Titulo FROM tb_Template WHERE id_Template = 1 "
            );
            $stmt->execute();
            $fetch = $stmt->fetch();
            echo $fetch["ds_Titulo"]; ?></h4>
        <p>
          <?php
          $stmt = $pdo->prepare(
            "SELECT ds_Descricao FROM tb_Template WHERE id_Template = 1 "
          );
          $stmt->execute();
          $fetch = $stmt->fetch();
          echo $fetch["ds_Descricao"]; ?>
        </p>
        <div class="user">
          <div class="user-info">
            <a href="template-detail.php?template=<?php echo $template = 1 ?>">
              <button class="button">Acessar</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <img src="../assets/templates/cover-img/template02.png" alt="" />
      </div>
      <div class="card-body">
        <span class="tag tag-pink">Educação</span>
        <h4><?php
            $stmt = $pdo->prepare(
              "SELECT ds_Titulo FROM tb_Template WHERE id_Template = 2 "
            );
            $stmt->execute();
            $fetch = $stmt->fetch();
            echo $fetch["ds_Titulo"]; ?></h4>
        <p>
          <?php
          $stmt = $pdo->prepare(
            "SELECT ds_Descricao FROM tb_Template WHERE id_Template = 2 "
          );
          $stmt->execute();
          $fetch = $stmt->fetch();
          echo $fetch["ds_Descricao"]; ?>
        </p>
        <div class="user">
          <div class="user-info">
            <a href="template-detail.php?template=<?php echo $template = 2 ?>">
              <button class="button">Acessar</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <img src="../assets/templates/cover-img/template03.png" alt="" />
      </div>
      <div class="card-body">
        <span class="tag tag-purple">Animais</span>
        <h4><?php
            $stmt = $pdo->prepare(
              "SELECT ds_Titulo FROM tb_Template WHERE id_Template = 3 "
            );
            $stmt->execute();
            $fetch = $stmt->fetch();
            echo $fetch["ds_Titulo"]; ?></h4>
        <p>
          <?php
          $stmt = $pdo->prepare(
            "SELECT ds_Descricao FROM tb_Template WHERE id_Template = 3 "
          );
          $stmt->execute();
          $fetch = $stmt->fetch();
          echo $fetch["ds_Descricao"]; ?>
        </p>
        <div class="user">
          <div class="user-info">
            <a href="template-detail.php?template=<?php echo $template = 3 ?>">
              <button class="button">Acessar</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src='../js/home.js'></script>
  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js">
  </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>