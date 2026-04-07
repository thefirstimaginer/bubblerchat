<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Like.Me | Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Fira+Sans:wght@400;700&display=swap');
        :root {
            --primary: #2dd4bf; /* Um aquamarine mais moderno */
            --primary-dark: #0d9488;
            --bg-gradient: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Alan Sans', sans-serif;
            background: var(--bg-gradient);
            color: var(--text-dark);
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        /* Header e Navegação */
        header.top-bar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 0.75rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
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
            color: var(--text-muted);
            font-weight: 600;
            margin: 0;
        }

        #nav {
            display: flex;
            gap: 1.5rem;
        }

        #nav a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            transition: color 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        #nav a:hover {
            background-color: var(--primary);
            color: white;
        }

        #nav a:last-child {
            background-color: var(--primary-dark);
            color: white;
        }

        /* Conteúdo Principal */
        main {
            flex: 1;
            padding: 3rem 5%;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        .welcome-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .card {
            background: var(--white);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(45, 212, 191, 0.2);
        }

        .hero-section {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .hero-content {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .hero-text {
            flex: 1;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-dark);
        }

        ul {
            padding-left: 1.2rem;
            color: var(--text-muted);
        }

        li {
            margin-bottom: 1rem;
        }

        #lazybg {
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            border: 8px solid var(--primary);
            box-shadow: var(--shadow);
            animation: morph 8s ease-in-out infinite;
        }

        @keyframes morph {
            0% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
            50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
            100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        }

        .sidebar-card {
        }

        /* Rodapé */
        footer {
            background: var(--white);
            padding: 2rem 5%;
            text-align: center;
            margin-top: 3rem;
            border-top: 1px solid #e2e8f0;
        }

        .footer-links {
            margin-bottom: 1rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            text-decoration: none;
            color: var(--primary-dark);
            font-weight: 500;
        }

        .copyright {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        /* Responsividade Mobile */
        @media (max-width: 768px) {
            header.top-bar {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .welcome-grid {
                grid-template-columns: 1fr;
            }

            .hero-content {
                flex-direction: column-reverse;
                text-align: center;
            }

            #lazybg {
                width: 180px;
                height: 180px;
            }
        }
    </style>
</head>
<body>

    <header class="top-bar">
        <section id="title">
            <h1>Like.Me</h1>
        </section>

        <nav id="nav">
            <a href="../">Modo Clássico</a>
            <a href="./login/">Login</a>
            <a href="./register/">Register</a>
            <a href="./help/">Help</a>
        </nav>
    </header>

    <main>
        <div class="welcome-grid">
            <section class="card hero-section">
                <h2>Bem-vindo(a) ao Like.Me!</h2>
                <div class="hero-content">
                    <div class="hero-text">
                        <ul>
                            <li><strong>Hub Social:</strong> Uma experiência online completa em um único lugar.</li>
                            <li><strong>Liberdade Total:</strong> Assista vídeos, crie salas de conferência, ouça músicas e faça lives com seus amigos.</li>
                            <li><strong>Entretenimento:</strong> Jogue, leia seus livros favoritos e publique seu próprio conteúdo para a comunidade.</li>
                        </ul>
                    </div>
                    <!-- Placeholder de imagem com fallback -->
                    <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=500" id="lazybg" alt="Lazy Background">
                </div>
            </section>

            <aside class="card sidebar-card">
                <h2>Destaque</h2>
                <ul>
                    <li>A LIM redefine o conceito de "Hub Social" para a nova geração.</li>
                </ul>

                <h2>Missão</h2>
                <ul>
                    <li>A Like.Me, cria um novo espaço na web</li>
                </ul>
            </aside>
        </div>
    </main>

    <footer>
        <div class="footer-links">
            <a href="./about/">About</a>
            <a href="./contact/">Contact</a>
            <a href="#">Discord</a>
            <a href="./donate/">Donate</a>
            <a href="./privacy/">Privacy</a>
        </div>
        <p class="copyright">© 2026 Imagine Computing & Technologies LLC. All Rights Reserved.</p>
    </footer>

</body>
</html>
