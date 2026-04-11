<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

    include("../private/connection/autoload.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_nickname = $_POST['user_nickname'];
        $password = $_POST['password'];

        if(!empty($user_nickname) && !empty($password))
        {

            //read from database
            $query = "select * from lim_users where user_nickname = '$user_nickname' limit 1";

            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: ../dashboard/");
                        die;
                    }
                }

            }
        }else
        {
            echo "Please enter some valid information!";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIM | Login na LIM</title>
    <link rel="icon" href="http://localhost/p_lim_images/faviconb.ico">
    <link rel="stylesheet" href="../private/styles/login-logout.css">
</head>
<body>
    <header class="top-bar">
        <div class="logo" style="text-align:center;">
            <h1>likestorm</h1>
            <p>likestorm webspace&trade;</p>
        </div>
        <nav id="nav">
            <a href="../register/">Ou crie uma conta LIM!</a>
        </nav>
    </header>

    <main>
        <div class="main-card">
            <!-- Barra Lateral Decorativa -->
            <section class="visual-side">
                <img src="faviconb.jpg" id="lazybg" alt="Logo LIM" onerror="this.src='http:///localhost/lim/p_lim_images/lazybg.jpg'">
                <h2>Bem-vindo de volta!</h2>
                <p>Entre em seu perfil e comece a conversar.</p>
            </section>

            <!-- Lado do Formulário -->
            <section class="form-side">
                <div class="form-header">
                    <h2>Entrar na LIM</h2>
                </div>

                <form id="loginForm" method="POST">
                    <div class="input-group">
                        <label for="username">Usuário / Nickname</label>
                        <div class="user-input-wrapper">
                            <input type="text" id="username" name="user_nickname" placeholder="Seu nick na LIM" required autocomplete="off">
                            <!--<span id="suffix" class="domain-suffix">@lim.com</span>-->
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="pass">Senha</label>
                        <input type="password" id="pass" name="password" class="input-standard" required>
                    </div>

                    <button type="submit" class="btn-register" value="login">Entrar!</button>
                </form>

                <div class="footer-info">
                    Não tem uma conta LIM? <a href="http:///localhost/register/">Crie uma!</a>
                </div>
            </section>
        </div>
    </main>

    <footer>
        © 026 Likestorm, The Imaginer's Alliance.
    </footer>

    <script>
        const usernameInput = document.getElementById('username');
        const suffixSpan = document.getElementById('suffix');

        usernameInput.addEventListener('input', function() {
            // Se houver algum texto digitado, mostra o sufixo. Caso contrário, esconde.
            if (this.value.length > 0) {
                suffixSpan.style.display = 'block';
            } else {
                suffixSpan.style.display = 'none';
            }
        });
    </script>
</body>
</html>