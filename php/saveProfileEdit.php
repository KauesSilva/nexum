<?php
// Incluir arquivo de configuração
require_once "connection.php";

// Definindo variáveis e inicalizando com valores vazios
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["nome"]);
    $description = trim($_POST["descricao"]);
    session_start();
    $id = $_SESSION["id_Usuario"];
    $sql =
        "UPDATE tb_Usuario SET nm_Usuario=?, ds_Descricao=? WHERE id_Usuario=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $description, $id]);

    $name_error = $email_error = $comment_error = $website_error = "";
    $name = $email = $comment = $website = $userImage = "";
    try {
        $file_name = trim($_FILES["imageUpload"]["name"]);
        $temp_file_name = $_FILES["imageUpload"]["tmp_name"];
        $file_size = $_FILES["imageUpload"]["size"];
        $target_dir = "../assets/uploads/profile/";
        $target_file = strtolower($target_dir . basename($file_name));
        $upload_ok = 1;
        $img_file_type = pathinfo($target_file, PATHINFO_EXTENSION);

        if ($temp_file_name != null) {
            //Check if image is an actual image or fake image
            $check_img = getimagesize($temp_file_name);

            if ($check_img == false) {
                echo "O Arquivo não é uma imagem!";
                $upload_ok = 0;
            } else {
                $upload_ok = 1;
                //Check file size
                if ($file_size > 500000) {
                    echo "Please enter a file size between 5mb";
                    $upload_ok = 0;
                } else {
                    //Allow certain file formats
                    if (
                        $img_file_type != "jpg" &&
                        $img_file_type != "png" &&
                        $img_file_type != "jpeg" &&
                        $img_file_type != "gif"
                    ) {
                        echo "JPG, PNG, JPEG and GIF files are allowed";
                        $upload_ok = 0;
                    } else {
                        //Check if $upload_ok is set to 0 by an error
                        if ($upload_ok === 0) {
                            echo "File has not been uploaded";
                        } else {
                            if (
                                move_uploaded_file(
                                    $temp_file_name,
                                    $target_file
                                )
                            ) {
                                $db_query =
                                    "UPDATE tb_Usuario SET ds_profilePath=:image_path where id_Usuario=:id";
                                $statement = $pdo->prepare($db_query);
                                $statement->bindParam(
                                    ":image_path",
                                    $target_file,
                                    PDO::PARAM_STR
                                );
                                $statement->bindParam(
                                    ":id",
                                    $id,
                                    PDO::PARAM_STR
                                );
                                $statement->execute();
                                echo "<script type='text/javascript'>
                                        window.location.href='profile.php';
                                    </script>";
                            }
                        }
                    }
                }
            }
        } else {
            echo "<script type='text/javascript'>
                    window.location.href='profile.php';
                  </script>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}