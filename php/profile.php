<?php
require_once "login.php";

session_start();

// Verificando se o usuário está logado, se não, redireciona-o para o login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: form.php");
    exit();
}

// Pegando o caminho dinâmico da imagem de perfil //
$id = $_SESSION["id_Usuario"];
$stmt = $pdo->prepare(
    "SELECT ds_profilePath FROM tb_Usuario WHERE id_Usuario = '$id' "
);
$stmt->execute();
$fetch = $stmt->fetch();
$profile_path = $fetch["ds_profilePath"];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Nexum</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel='stylesheet' type='text/css' media='screen' href='../css/profile.css?v=1'>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/e40051a8be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
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
                <a href="../php/home.php" class="navItem">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Projetos</span>
                </a>
                <span class="tooltip">Projetos</span>
            </li>
            <li>
                <a href="profile.php" class="navItem active">
                    <i class='bx bx-user active'></i>
                    <span class="links_name active">Usuário</span>
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
                    <img src="<?php echo $profile_path; ?>" alt="profileImg">
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

                            <div class="job">
                                <?php
                                require_once "login.php";
                                echo $_SESSION["ds_Email"];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
            </li>
        </ul>
    </div>

    <!--Profile-->
    <div class="container">
        <div class="card">
                <div class="profile-container">
                    <div class="profile-img">
                        <div style="background-image: url('<?php echo $profile_path; ?>');"></div>
                    </div>
                </div>
                <div class="infos">
                    <div class="name">
                        <h2 id="name">
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
                        </h2>

                        <form method="POST" action="saveProfileEdit.php" id="formProfile" enctype="multipart/form-data">
                            <div class="editableInputs">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" name="imageUpload" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('<?php echo $profile_path; ?>');"></div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                                    </div>
                                    <input type="text" name="nome" id="nome" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php
                                    require_once "login.php";
                                    $id = $_SESSION["id_Usuario"];
                                    $stmt = $pdo->prepare(
                                        "SELECT nm_Usuario FROM tb_Usuario WHERE id_Usuario = '$id' "
                                    );
                                    $stmt->execute();
                                    $fetch = $stmt->fetch();
                                    echo $fetch["nm_Usuario"];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descrição</label>
                                    <textarea maxlength="255" class="form-control" id="descricao" name="descricao" id="exampleFormControlTextarea1" rows="2" ng-model='foo'><?php
                                    require_once "login.php";
                                    $id = $_SESSION["id_Usuario"];
                                    $stmt = $pdo->prepare(
                                        "SELECT ds_Descricao FROM tb_Usuario WHERE id_Usuario = '$id' "
                                    );
                                    $stmt->execute();
                                    $fetch = $stmt->fetch();
                                    echo $fetch["ds_Descricao"];
                                    ?></textarea>
                                </div>
                                <div class="links">
                                    <button class="save" id="saveEdit">Salvar</button>
                                </div>
                        </form>

                        <h4>
                            <?php
                            require_once "login.php";
                            $id = $_SESSION["id_Usuario"];
                            $stmt = $pdo->prepare(
                                "SELECT nm_Usuario FROM tb_Usuario WHERE id_Usuario = '$id' "
                            );
                            $stmt->execute();
                            $fetch = $stmt->fetch();
                            echo "@" . $fetch["nm_Usuario"];
                            ?>
                        </h4>
                    </div>
                    <p class="text" id="description">
                        <?php
                        require_once "login.php";
                        $id = $_SESSION["id_Usuario"];
                        $stmt = $pdo->prepare(
                            "SELECT ds_Descricao FROM tb_Usuario WHERE id_Usuario = '$id' "
                        );
                        $stmt->execute();
                        $fetch = $stmt->fetch();
                        echo $fetch["ds_Descricao"];
                        ?>
                    </p>
                    <ul class="stats">
                        <li>
                            <a href="#" class="social-icon">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-icon">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-icon">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="links">
                        <button class="edit" id="editProfile">Editar perfil</button>
                    </div>
                </div>
            </div>
        </div>
        <script src='../js/profile.js?=3'></script>
        <script src='../js/home.js'></script>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <script src="https://kit.fontawesome.com/e40051a8be.js" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>
</body>

</html>