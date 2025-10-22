<?php
    require_once "connection.php";
    $template_id = $_GET['template'];
    $stmt = $pdo->prepare(
        "SELECT ds_zipPath FROM tb_Template WHERE id_Template = '$template_id' "
      );
    $stmt->execute();
    $fetch = $stmt->fetch();
    $zip_location = $fetch["ds_zipPath"];
    $demo_name = "Seu Template.zip";
    header('Content-type: application/zip');  
    header('Content-Disposition: attachment; filename="'.$demo_name.'"');  
    readfile($zip_location);
