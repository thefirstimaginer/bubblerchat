<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

    include("../private/connection/autoload.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name'];
        $user_nickname = $_POST['user_nickname'];
        $user_birthday = $_POST['user_birthday'];
        $user_email = $_POST['user_email'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            // 1. Encriptar a senha antes de salvar
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            
            $user_id = random_num(20);

            // 2. Usar Prepared Statements para evitar SQL Injection
            $query = "INSERT INTO lim_users (user_id, user_name, user_nickname, user_birthday, user_email, password) VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt = mysqli_prepare($con, $query);
            
            if ($stmt) {
                // "ssssss" significa que estamos enviando 6 strings
                mysqli_stmt_bind_param($stmt, "ssssss", $user_id, $user_name, $user_nickname, $user_birthday, $user_email, $password_hashed);
                mysqli_stmt_execute($stmt);
                
                header("Location: ../dashboard/");
                die;
            } else {
                echo "Erro ao preparar a consulta: " . mysqli_error($con);
            }
        } else {
            echo "Por favor, insira informações válidas!";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIM | Criar Conta LIM</title>
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
            <a href="../login/">Entrar</a>
        </nav>
    </header>

    <main>

        <div class="main-card">
            <!-- Barra Lateral Decorativa -->
            <section class="visual-side">
                <img src="faviconb.jpg" id="lazybg" alt="Logo LIM" onerror="this.src='http:///localhost/lim/p_lim_images/lazybg.jpg'">
                <h2>Bem-vindo(a) a LIM!</h2>
                <p>Crie seu perfil e comece a conversar.</p>
            </section>

            <!-- Lado do Formulário -->
            <section class="form-side">
                <div class="form-header">
                    <h2>Criar nova conta</h2>
                </div>

                <form id="registerForm" method="POST">
                    <div class="input-row">
                        <div class="input-group">
                            <label for="name">Nome Completo</label>
                            <input type="text" id="user_name" name="user_name" placeholder="Ex: João Silva" required>
                        </div>
                        <div class="input-group">
                            <label for="nickname">Apelido (Nickname)</label>
                            <input type="text" id="user_nickname" name="user_nickname" placeholder="nick@lim.com" autocomplete="username" required>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="input-group">
                            <label for="user">Aniversário</label>
                            <input type="date" id="birthday" name="user_birthday" required>
                        </div>
                        <div class="input-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="user_email" placeholder="seuemail@email.com" required>
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="input-group">
                            <label for="pass">Senha</label>
                            <input type="password" id="password" name="password" autocomplete="new-password" required>
                        </div>
                        <div class="input-group">
                            <label for="pass-confirm">Confirmar Senha</label>
                            <input type="password" id="pass-confirm" name="pass-confirm" autocomplete="new-password" required>
                            <span id="error-msg" style="color: #ff4d4d; font-size: 0.75rem; display: none; margin-top: 5px;">As senhas não coincidem!</span>
                        </div>
                    </div>

                    <button type="submit" class="btn-register">Registrar Agora!</button>
                </form>

                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.getElementById('registerForm');
                    const senha = document.getElementById('password');
                    const confirma = document.getElementById('pass-confirm');
                    const erroMsg = document.getElementById('error-msg');
                    const nicknameInput = document.getElementById('user_nickname');

                    function validarSenhas() {
                        if (senha.value !== confirma.value && confirma.value !== "") {
                            // Senhas diferentes: borda vermelha e mostra texto
                            confirma.style.borderColor = "#ff4d4d";
                            erroMsg.style.display = "block";
                            return false;
                        } else {
                            // Senhas iguais ou campo vazio: volta ao normal
                            confirma.style.borderColor = "#2dd4bf";
                            erroMsg.style.display = "none";
                            return true;
                        }
                    }

                    function validarNickname() {
                        const nick = nicknameInput.value.trim(); // Remove espaços extras
                        const sufixo = "@lim.com";

                        if (nick !== "" && !nick.endsWith(sufixo)) {
                            // Se o nick não termina com @lim.com, mostra erro visual
                            nicknameInput.style.borderColor = "#ff4d4d";
                            return false;
                        } else {
                            // Se estiver correto ou vazio, volta a borda ao normal
                            nicknameInput.style.borderColor = "#2dd4bf";
                            return true;
                        }
                    }

                    // Valida em tempo real enquanto o usuário digita
                    confirma.addEventListener('input', validarSenhas);
                    senha.addEventListener('input', validarSenhas);
                    nicknameInput.addEventListener('input', validarNickname);

                    // Valida no momento do envio (Submit)
                    form.onsubmit = function(e) {
                        const senhasValidas = validarSenhas(); // Função que já criamos antes
                        const nicknameValido = validarNickname();

                        if (!senhasValidas || !nicknameValido) {
                            alert("Por favor, corrija os erros no formulário antes de prosseguir.");
                            e.preventDefault(); 
                            return false;
                        }
                        return true;
                    };
                });
                </script>

                <div class="footer-info">
                    Ao clicar em registrar, você aceita nossos <a href="#">Termos</a>.<br><br>
                    Já tem conta? <a href="../login/">Faça o login</a>
                </div>
            </section>
        </div>
    </main>

    <footer>
        © 2025-2026 The LIM Project.
    </footer>
</body>
</html>