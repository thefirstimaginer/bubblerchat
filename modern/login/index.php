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
                        header("Location: ./dashboard/");
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
    <title>Like.Me | Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        
        :root {
            --primary: #2dd4bf;
            --primary-dark: #0d9488;
            --bg-cadet: #5f9ea0; /* CadetBlue */
            --bg-darker: #ccfbf1;
            --bg-gradient: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --text-main: #1e293b;
            --white: #ffffff;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: "Alan Sans", sans-serif;
            background: var(--bg-gradient);
            color: var(--text-dark);
            margin: 0;
            min-height: 100vh;
            line-height: 1.5;
            display: flex;
            flex-direction: column;
        }

        /* Header igual ao da Home */
        header.top-bar {
            background: rgba(255, 255, 255, 0.8);
            color: var(--text-main);
            backdrop-filter: blur(12px);
            padding: 0.75rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        #title h1 {
            font-size: 2em;
            font-weight: 800;
            color: var(--primary-dark);
            margin: 0;
            letter-spacing: -0.025em;
        }

        #title p {
            font-size: 0.8rem;
            color: white;
            font-weight: 600;
            margin: 0;
        }

        #nav{
            display: flex;
            gap: 1.5rem;
        }

        #nav a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        #nav a:hover {
            background-color: var(--primary);
            color: white;
        }

        /* Container de Login */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 5%;
        }

        .login-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            max-width: 900px;
            width: 100%;
            background: var(--white);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.2);
        }

        /* Lado Esquerdo - Visual */
        .login-visual {
            background: var(--bg-cadet);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            color: white;
            text-align: center;
        }

        #lazybg {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            border: 6px solid var(--primary);
            margin-bottom: 2rem;
            animation: morph 8s ease-in-out infinite;
        }

        @keyframes morph {
            0% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
            50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
            100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        }

        /* Lado Direito - Formulário */
        .login-form-container {
            padding: 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-left: 2px dashed var(--bg-cadet);
        }

        .login-form-container h2 {
            font-size: 2rem;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .login-form-container p {
            color: var(--text-muted);
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }

        .input-group {
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .input-group label {
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--bg-cadet);
            text-transform: uppercase;
        }

        .input-group input {
            padding: 0.8rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-family: inherit;
            transition: all 0.3s ease;
            outline: none;
        }

        .input-group input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(45, 212, 191, 0.1);
        }

        .btn-login {
            background: var(--primary-dark);
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 12px;
            font-weight: 800;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.3s ease;
            margin-top: 1rem;
        }

        .btn-login:hover {
            background: var(--bg-cadet);
            transform: translateY(-2px);
        }

        .extra-links {
            margin-top: 1.5rem;
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
        }

        .extra-links a {
            color: var(--primary-dark);
            text-decoration: none;
            font-weight: 600;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }

        /* Footer */
        footer {
            background: var(--bg-cadet);
            padding: 1.5rem 5%;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .footer-links a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            margin: 0 0.5rem;
            font-size: 0.9rem;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .login-grid {
                grid-template-columns: 1fr;
                border-radius: 20px;
                margin: 1rem;
            }
            .login-visual {
                padding: 2rem;
            }
            #lazybg {
                width: 120px;
                height: 120px;
            }
            .login-form-container {
                padding: 2rem;
                border-left: none;
                border-top: 2px dashed var(--bg-cadet);
            }
        }
    </style>
</head>
<body>
    <header class="top-bar">
        <section id="title">
            <a href="/" style="text-decoration: none;">
                <h1>Like.Me</h1>
            </a>
        </section>
        <nav id="nav">
            <a href="../">Voltar ao Início</a>
        </nav>
    </header>

    <main>
        <div class="login-grid">
            <!-- Lado Visual -->
            <section class="login-visual">
                <img src="faviconb.jpg" id="lazybg" alt="Logo LIM" onerror="this.src='http:///localhost/lim/p_lim_images/lazybg.jpg'">
                <h2>Like.Me Social Hub.</h2>
                <p>Onde Tudo Acontece.</p>
            </section>

            <!-- Lado do Formulário -->
            <section class="login-form-container">
                <h2>Login</h2>
                <p>Bem-vindo de volta ao seu Hub Social preferido!</p>

                <form action="../dashboard/" method="POST">
                    <div class="input-group">
                        <label for="user">Nickname Like.Me</label>
                        <input type="text" id="user" name="user_nickname" placeholder="seunick@like.me" required>
                    </div>

                    <div class="input-group">
                        <label for="pass">Senha</label>
                        <input type="password" id="pass" name="password" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn-login">Entrar no LIM</button>
                </form>

                <div class="extra-links">
                    <a href="#">Esqueceu a senha?</a>
                    <a href="../register/">Criar conta</a>
                </div>
            </section>
        </div>
    </main>

    <footer>
        <div class="footer-links">
            <a href="#">Sobre</a>
            <a href="#">Ajuda</a>
            <a href="#">Privacidade</a>
        </div>
        <p style="color: rgba(255,255,255,0.7); font-size: 0.8rem; margin-top: 1rem;">© 2025-2026 LIM</p>
    </footer>
</body>
</html>
