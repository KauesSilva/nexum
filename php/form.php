<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Nexum</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel='stylesheet' type='text/css' media='screen' href='../css/form.css'>
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="login.php" method="POST" class="sign-in-form" id="formLogin" data-netlify="true">
          <h2 class="title">Login</h2>
          <div class="input-field">
            <i class="bi bi-envelope-fill"></i>
            <input type="email" name="email" placeholder="E-mail" id="email" required />
          </div>
          <div class="input-field">
            <i class="bi bi-key-fill"></i>
            <input type="password" name="senha" placeholder=" Senha" id="senha" required />
          </div>
          <input type="submit" value="Login" id="login" name="login" class="btn solid" />
          <p class="social-text">Ou entre com as suas redes sociais</p>
          <div class="social-media">
            <a href="home.php" class="social-icon">
              <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="bi bi-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="bi bi-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="bi bi-linkedin"></i>
            </a>
          </div>
        </form>
        <form method="POST" action="register.php" class="sign-up-form" id="formCadastro" data-netlify="true">
          <h2 class="title">Cadastre-se</h2>
          <div class="input-field">
            <i class="bi bi-person-fill"></i>
            <input type="text" name="nome" id="nome" placeholder="Nome" required />
          </div>
          <div class="input-field">
            <i class="bi bi-envelope-fill"></i>
            <input type="email" name="email" id="email" placeholder="E-mail" required />
          </div>
          <div class="input-field">
            <i class="bi bi-key-fill"></i>
            <input type="password" name="senha" id="senha" placeholder="Senha" required />
          </div>
          <input type="submit" name="cadastrar" id="cadastrar" class="btn" value="Cadastrar" />
          <p class="social-text">Ou cadastre-se com suas redes sociais</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="bi bi-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="bi bi-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="bi bi-linkedin"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Não tem uma conta ?</h3>
          <p> Crie uma para utilizar todas ferramentas disponíveis e ter acesso a diversos layouts! </p>
          <button class="btn transparent" id="sign-up-btn"> Criar </button>
        </div>
        <img src="../assets/img/login.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Já tem uma conta ?</h3>
          <p> Entre para acessar seus layouts favoritos! </p>
          <button class="btn transparent" id="sign-in-btn"> Entrar </button>
        </div>
        <img src="../assets/img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>
  <script type="text/javascript" src="../js/form.js"></script>
  <script src="jquery-3.6.0.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
</body>

</html>