<?php
    require_once "connection.php";
    session_start();
    // Verificando se o usuário está logado, se não, redireciona-o para o login
    if ($_SESSION["id_Usuario"] != 1){
        header("location: form.php");
        exit();
      }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Nexum</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../css/home_admin.css?=2   " />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-flex justify-content-center">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold text-center">Nexum Dashboard</h1>
                <p class="fs-4 text-center">Bem-vindo à página de administração!</p>
            </div>
        </div>

        <div class="container">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th class="fs-4" width="80px" scope="col"></th>
                        <th class="fs-4" scope="col">ID</th>
                        <th class="fs-4" scope="col">Nome</th>
                        <th class="fs-4" scope="col">E-mail</th>
                        <th class="fs-4" scope="col">Tipo</th>
                        <th class="fs-4" scope="col">Acesso</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    try {
                        $sql = $pdo->query("SELECT * FROM tb_Usuario");
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr class="text-center align-middle">';
                            echo '<th scope="row"> <img class="" width="90px" src="' . $row['ds_profilePath'] . '" </td>';
                            echo '<th class="fs-5">' . $row['id_Usuario'] . '</th>';
                            echo '<td class="fs-5">' . $row['nm_Usuario'] . '</td>';
                            echo '<td class="fs-5">' . $row['ds_Email'] . '</td>';
                            echo '<td class="fs-5">' . $row['ds_tipo_Usuario'] . '</td>';
                            echo '<td class="fs-5">' . $row['dt_Acesso'] . '</td>';
                            echo '</tr>';
                        }
                    } catch (PDOException $e) {
                        echo "Falha ao buscar contatos: " . $e->getMessage();
                    }
                    ?>
                </tbody>

            </table>

            <table class="table table-bordered mt-5">
                <thead class="table-dark">
                    <tr>
                        <th class="fs-4" scope="col">ID</th>
                        <th class="fs-4" scope="col">Emissão</th>
                        <th class="fs-4" scope="col">Valor</th>
                        <th class="fs-4" scope="col">Usuário</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    try {
                        $sql = $pdo->query("SELECT * FROM tb_multa");
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr class="text-center align-middle">';
                            echo '<th class="fs-5" scope="row">' . $row['id_multa'] . '</th>';
                            echo '<td class="fs-5">' . $row['dt_multa'] . '</td>';
                            echo '<td class="fs-5">' . $row['vl_multa'] . '</td>';
                            echo '<td class="fs-5">' . $row['id_usuario'] . '</td>';
                            echo '</tr>';
                        }
                    } catch (PDOException $e) {
                        echo "Falha ao buscar contatos: " . $e->getMessage();
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
</body>

</html>