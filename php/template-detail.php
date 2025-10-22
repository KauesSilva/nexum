<?php
require_once "login.php";

session_start();
// Verificando se o usuário está logado, se não, redireciona-o para o login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: form.php");
  exit();
}

$template_id = $_GET['template'];

//Recebendo o título dinâmico do template//
$stmt = $pdo->prepare(
  "SELECT ds_Titulo FROM tb_Template WHERE id_Template = '$template_id' "
);
$stmt->execute();
$fetch = $stmt->fetch();
$titulo = $fetch["ds_Titulo"];

//Recebendo a descrição dinâmica do template//
$stmt = $pdo->prepare(
  "SELECT ds_Descricao FROM tb_Template WHERE id_Template = '$template_id' "
);
$stmt->execute();
$fetch = $stmt->fetch();
$descricao = $fetch["ds_Descricao"];

//Recebendo a data de criação dinâmica do template//
$stmt = $pdo->prepare(
  "SELECT dt_Criacao FROM tb_Template WHERE id_Template = '$template_id' "
);
$stmt->execute();
$fetch = $stmt->fetch();
$dt_Criacao = strtotime($fetch["dt_Criacao"]);
$dt_Criacao = date('d/m/Y', $dt_Criacao);

//Recebendo a data de atualização dinâmica do template//
$stmt = $pdo->prepare(
  "SELECT dt_Atualizacao FROM tb_Template WHERE id_Template = '$template_id' "
);
$stmt->execute();
$fetch = $stmt->fetch();
$dt_Atualizacao = strtotime($fetch["dt_Atualizacao"]);
$dt_Atualizacao = date('d/m/Y', $dt_Atualizacao);

//Recebendo a versão dinâmica do template//
$stmt = $pdo->prepare(
  "SELECT ds_Versao FROM tb_Template WHERE id_Template = '$template_id' "
);
$stmt->execute();
$fetch = $stmt->fetch();
$versao = $fetch["ds_Versao"];
$versao = number_format($versao, 1);

//Recebendo a imagem dinâmica do template//
$stmt = $pdo->prepare(
  "SELECT ds_imagePath FROM tb_Template WHERE id_Template = '$template_id' "
);
$stmt->execute();
$fetch = $stmt->fetch();
$image_path = $fetch["ds_imagePath"];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Nexum</title>
    <meta name='viewport' id="viewport" content='width=device-width, initial-scale=1'>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/template-detail.css?=1'>
    <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

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
          <img src="<?php
                    require_once "login.php";
                    $id = $_SESSION["id_Usuario"];
                    $stmt = $pdo->prepare(
                      "SELECT ds_profilePath FROM tb_Usuario WHERE id_Usuario = '$id' "
                    );
                    $stmt->execute();
                    $fetch = $stmt->fetch();
                    echo $fetch["ds_profilePath"];
                    ?>" alt="profileImg">
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
  <section class="container-fluid">
    <div class="container-fluid col-md-10">
      <div class="row justify-space-around">
        <div class="col-md-6">
          <div class="img-overlay">
            <img src="<?php echo $image_path; ?>" width=600px" height="500px" class="btn-block template-img img-fluid" alt="">
            <div class="overlay-content">
            <a href="preview.php?template=<?php echo $template_id?>" target="_blank">
                <button class="btn btn-light"><i class="bi bi-box-arrow-up-right"></i> Visualizar</button>
              </a>
            </div>
          </div>
          <a href="preview.php?template=<?php echo $template_id?>" target="_blank">
            <button class="btn btn-info"><i class="bi bi-eye"></i> Preview</button>
          </a>
          <button class="btn btn-dark"><i class="bi bi-github"></i> Código fonte</button>
        </div>
        <div class="col-md-6">
          <h1 class="font-weight-bold"><?php echo $titulo; ?></h1>
          <p><?php echo $descricao; ?></p>
          <a class="btn btn-primary btn-block" href="download.php?template=<?php echo $template_id ?>">
            <i class="bi bi-download"></i> Download Grátis
          </a>
          <a class="btn btn-outline-success btn-block" href="../index.html">
            <i class="bi bi-coin"></i> Torne-se Premium
          </a>
          <ul class="list-group">
            <li class="list-group-item"><small>Direitos: ©<?php echo date("Y"); ?> Nexum</small></li>
            <li class="list-group-item"><small>Data de lançamento: <?php echo $dt_Criacao; ?></small></li>
            <li class="list-group-item"><small>Versão do template: <?php echo $versao; ?></small></li>
            <li class="list-group-item"><small>Última atualização: <?php echo $dt_Atualizacao; ?></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <script src='../js/home.js?=3'></script>
  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js">
  </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>