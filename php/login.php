<?php
// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: home.php");
  exit;
}

// Incluir arquivo de configuração
require_once "connection.php";
require_once "sweetAlert.php";


// Definindo variáveis e inicialize com valores vazios
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Salvando a data e horário atual
date_default_timezone_set("America/Sao_Paulo");
$datetime = date('Y-m-d H:i:s');

// Processando dados do formulário qu ando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Verifique se o nome de usuário está vazio
  if (empty(trim($_POST["email"]))) {
    $email_err = "Por favor, insira o e-mail!";
    echo ("<script language='JavaScript'>
        Swal.fire({
          title: 'Erro',
          text: 'Por favor, insira o e-mail!',
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

  // Verifique se a senha está vazia
  if (empty(trim($_POST["senha"]))) {
    $password_err = "Por favor, insira sua senha!";
    echo ("<script language='JavaScript'>
        Swal.fire({
          title: 'Erro',
          text: 'Por favor, insira sua senha!',
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

  // Validar credenciais
  if (empty($email_err) && empty($password_err)) {
    // Prepare uma declaração selecionada
    $sql = "SELECT id_Usuario, ds_Email, cd_Senha FROM tb_Usuario WHERE ds_Email = :email";

    if ($stmt = $pdo->prepare($sql)) {
      // Vincule as variáveis à instrução preparada como parâmetros
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

      // Definir parâmetros
      $param_email = trim($_POST["email"]);

      // Tente executar a declaração preparada
      if ($stmt->execute()) {
        // Verifique se o nome de usuário existe, se sim, verifique a senha
        if ($stmt->rowCount() == 1) {
          if ($row = $stmt->fetch()) {
            $id = $row["id_Usuario"];
            $email = $row["ds_Email"];
            $hashed_password = $row["cd_Senha"];

            if (password_verify($password, $hashed_password)) {
              // A senha está correta, então inicie uma nova sessão
              session_start();

              // Armazene dados em variáveis de sessão
              $_SESSION["loggedin"] = true;
              $_SESSION["id_Usuario"] = $id;
              $_SESSION["ds_Email"] = $email;
              
              // Redirecionar o usuário para a página de boas-vindas
              if ($_SESSION["id_Usuario"] == 1){
                echo ("<script language='JavaScript'>
                        window.location.href='home_admin.php';
                      </script>");
              }
              else {
                echo ("<script language='JavaScript'>
                        window.location.href='home.php';
                      </script>");              }
              // Salve data e horário de acesso
              $sql = "UPDATE tb_Usuario SET dt_Acesso = :datetime WHERE id_Usuario = $id";

              if ($stmt = $pdo->prepare($sql)) {
                // Vincule as variáveis à instrução preparada como parâmetros
                $stmt->bindParam(":datetime", $param_date, PDO::PARAM_STR);

                // Definir parâmetros
                $param_date = $datetime;

                // Tente executar a declaração preparada
                $stmt->execute();

                // Fechar declaração
                unset($stmt);
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
            } else {
              // A senha não é válida, exibe uma mensagem de erro genérica
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
          }
        } else {
          // O nome de usuário não existe, exibe uma mensagem de erro genérica
          echo ("<script language='JavaScript'>
                    Swal.fire({
                      title: 'Erro',
                      text: 'E-mail ou senha inválidos!',
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
