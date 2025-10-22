<?php
require_once "login.php";

session_start();

// Verificando se o usuário está logado, se não, redireciona-o para o login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: form.php");
    exit();
}

$template_id = $_GET['template'];

//Recebendo a preview dinâmica do template//
$stmt = $pdo->prepare(
    "SELECT ds_previewPath FROM tb_Template WHERE id_Template = '$template_id' "
);
$stmt->execute();
$fetch = $stmt->fetch();
$preview_path = $fetch["ds_previewPath"];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Nexum</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/e40051a8be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../css/preview.css">
    <script src="../js/preview.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">NEXUM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="mobile-view">
                        <h2><i class="bi bi-phone"></i>
                    </a></h2></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="tablet-view">
                        <h2><i class="bi bi-tablet"></i></h2>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="desktop-view">
                        <h2><i class="bi bi-display"></i></h2>
                    </a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <a href="download.php?template=<?php echo $template_id ?>">
                    <button class="download-button">Download</button>
                </a>
            </div>
        </div>
    </nav>
    <div class="container-flex">
        <iframe id="content" class="content" src="<?php echo $preview_path; ?>" frameborder="0" allowfullscreen></iframe>
    </div>
</body>

</html>