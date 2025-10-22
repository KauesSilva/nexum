<?php
// Incluir arquivo de configuração
require_once "connection.php";
require_once "form.php";


// Defina variáveis e inicialize com valores vazios
$email = $password = $username = "";
$email_err = $password_err = $username_err = "";
$tipoUsuario = "ONG";

// Processando dados do formulário quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validar email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Por favor insira um e-mail!";
    echo ("<script language='JavaScript'>
        Swal.fire({
          title: 'Erro',
          text: 'Por favor insira um e-mail!',
          icon: 'error',
          confirmButtonText: 'Ok',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href='form.php';
          } else if (result.isDenied) {
          }
        })
        </script>");
  } elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', trim($_POST["email"]))) {
    $email_err = "Formato de e-mail inválido!";
    echo ("<script language='JavaScript'>
        Swal.fire({
          title: 'Erro',
          text: 'Formato de e-mail inválido!',
          icon: 'error',
          confirmButtonText: 'Ok',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href='form.php';
          } else if (result.isDenied) {
          }
        })
        </script>");
  } else {
    // Prepare uma declaração selecionada
    $sql = "SELECT id_Usuario FROM tb_Usuario WHERE ds_Email = :email";

    if ($stmt = $pdo->prepare($sql)) {
      // Vincule as variáveis à instrução preparada como parâmetros
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

      // Definir parâmetros
      $param_email = trim($_POST["email"]);

      // Tente executar a declaração preparada
      if ($stmt->execute()) {
        if ($stmt->rowCount() == 1) {
          $email_err = "Este e-mail já está em uso!";
          echo ("<script language='JavaScript'>
                    Swal.fire({
                      title: 'Erro',
                      text: 'Este e-mail já está em uso!',
                      icon: 'error',
                      confirmButtonText: 'Ok',
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href='form.php';
                      } else if (result.isDenied) {
                      }
                    })
                    </script>");
        } else {
          $email = trim($_POST["email"]);
        }
      } else {
        echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
        echo ("<script language='JavaScript'>
                Swal.fire({
                  title: 'Erro',
                  text: 'Ops! Algo deu errado. Por favor, tente novamente mais tarde.',
                  icon: 'error',
                  confirmButtonText: 'Ok',
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href='form.php';
                  } else if (result.isDenied) {
                  }
                })
                </script>");
      }

      // Fechar declaração
      unset($stmt);
    }
  }

  // Validar nome de usuário
  if (empty(trim($_POST["nome"]))) {
    $username_err = "Por favor insira um nome de usuário!";
    echo ("<script language='JavaScript'>
        Swal.fire({
          title: 'Erro',
          text: 'Por favor insira um nome de usuário!',
          icon: 'error',
          confirmButtonText: 'Ok',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href='form.php';
          } else if (result.isDenied) {
          }
        })
        </script>");
  } elseif (preg_match("/\$[A-Za-z_][A-Za-z_0-9]*/", trim($_POST["nome"]))) {
    $username_err = "Nome de usuário inválido!";
    echo ("<script language='JavaScript'>
        Swal.fire({
          title: 'Erro',
          text: 'Nome de usuário inválido!',
          icon: 'error',
          confirmButtonText: 'Ok',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href='form.php';
          } else if (result.isDenied) {
          }
        })
        </script>");
  } else {
    // Prepare uma declaração selecionada
    $sql = "SELECT id_Usuario FROM tb_Usuario WHERE nm_Usuario = :username";

    if ($stmt = $pdo->prepare($sql)) {
      // Vincule as variáveis à instrução preparada como parâmetros
      $stmt->bindParam(":username", $param_email, PDO::PARAM_STR);

      // Definir parâmetros
      $param_username = trim($_POST["nome"]);

      // Tente executar a declaração preparada
      if ($stmt->execute()) {
        if ($stmt->rowCount() == 1) {
          $username_err = "Este nome de usuário já está em uso!";
          echo ("<script language='JavaScript'>
                    Swal.fire({
                      title: 'Erro',
                      text: 'Este nome de usuário já está em uso!',
                      icon: 'error',
                      confirmButtonText: 'Ok',
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href='form.phpp';
                      } else if (result.isDenied) {
                      }
                    })
                    </script>");
        } else {
          $username = trim($_POST["nome"]);
        }
      } else {
        echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
        echo ("<script language='JavaScript'>
                Swal.fire({
                  title: 'Erro',
                  text: 'Ops! Algo deu errado. Por favor, tente novamente mais tarde.',
                  icon: 'error',
                  confirmButtonText: 'Ok',
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href='form.php';
                  } else if (result.isDenied) {
                  }
                })
                </script>");
      }

      // Fechar declaração
      unset($stmt);
    }
  }

  // Validar senha
  if (empty(trim($_POST["senha"]))) {
    $password_err = "Por favor insira uma senha!";
    echo ("<script language='JavaScript'>
        Swal.fire({
          title: 'Erro',
          text: 'Por favor insira uma senha!',
          icon: 'error',
          confirmButtonText: 'Ok',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href='form.php';
          } else if (result.isDenied) {
          }
        })
        </script>");
  } elseif (strlen(trim($_POST["senha"])) < 8) {
    $password_err = "A senha deve conter no mínimo 8 caracteres!";
    echo ("<script language='JavaScript'>
        Swal.fire({
          title: 'Erro',
          text: 'A senha deve conter no mínimo 8 caracteres!',
          icon: 'error',
          confirmButtonText: 'Ok',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href='form.php';
          } else if (result.isDenied) {
          }
        })
        </script>");
  } else {
    $password = trim($_POST["senha"]);
  }

  // Verifique os erros de entrada antes de inserir no banco de dados
  if (empty($username_err) && empty($email_err) && empty($password_err)) {

    // Prepare uma declaração de inserção
    $sql = "INSERT INTO tb_Usuario (nm_Usuario, ds_Email, cd_Senha, ds_tipo_Usuario) VALUES (:username, :email, :password, :tipoUsuario)";

    if ($stmt = $pdo->prepare($sql)) {
      // Vincule as variáveis à instrução preparada como parâmetros
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
      $stmt->bindParam(":tipoUsuario", $param_tipoUsuario, PDO::PARAM_STR);

      // Definir parâmetros
      $param_username = $username;
      $param_email = $email;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
      $param_tipoUsuario = $tipoUsuario;

      // Tente executar a declaração preparada
      if ($stmt->execute()) {
        // Redirecionar para a página de login
        echo "<script>
                        window.location.href='form.php';
                </script>";
      } else {
        echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
        echo ("<script language='JavaScript'>
                Swal.fire({
                  title: 'Erro',
                  text: 'Ops! Algo deu errado. Por favor, tente novamente mais tarde.',
                  icon: 'error',
                  confirmButtonText: 'Ok',
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href='form.php';
                  } else if (result.isDenied) {
                  }
                })
                </script>");
      }

      // Fechar declaração
      unset($stmt);
    }
  }

  // Fechar conexão
  unset($pdo);
}
