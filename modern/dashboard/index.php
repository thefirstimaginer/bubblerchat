
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIM | Modern Dashboard</title>
    <!-- Lucide Icons for modern look -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Fira+Sans:wght@400;700&display=swap');
        
        :root {
            --primary: #0d9488;
            --primary-hover: #0f766e;
            --bg-page: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --radius: 12px;
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        * {
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        body {
            font-family: 'Alan Sans', sans-serif;
            background-color: var(--bg-page);
            color: var(--text-main);
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            line-height: 1.5;
            zoom: 80%;
        }

        /* Top Bar Moderna */
        header.top-bar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
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

        .logo-area {
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }

        .logo-area h1 {
            font-size: 2em;
            color: var(--primary);
            margin: 0;
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        .logo-area p {
            font-size: 0.7rem;
            color: var(--text-muted);
            margin: -2px 0 0 0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .search-container {
            flex: 0 1 700px;
            margin: 0 2rem;
            position: relative;
        }

        .search-bar {
            background: #f1f5f9;
            border: 1px solid transparent;
            border-radius: 10px;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .search-bar:focus-within {
            background: white;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }

        .search-bar input {
            background: transparent;
            border: none;
            color: var(--text-main);
            outline: none;
            width: 100%;
            font-size: 0.9rem;
        }

        .search-icon {
            position: absolute;
            left: 10px;
            color: var(--text-muted);
        }

        .user-nav {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .user-nav a {
            color: var(--text-main);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: var(--radius);
        }

        .user-nav a:hover {
            background: #f1f5f9;
            color: var(--primary);
        }

        .btn-logout {
            background: #fee2e2;
            color: #ef4444 !important;
        }

        .btn-logout:hover {
            background: #fecaca !important;
        }

        /* Layout */
        .container {
            display: grid;
            grid-template-columns: 240px 1fr 280px;
            gap: 2rem;
            max-width: 1400px;
            margin: 2rem auto;
            width: 100%;
            padding: 0 2rem;
        }

        /* Sidebar Esquerda */
        .sidebar-left {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            position: sticky;
            top: 5rem;
            height: fit-content;
        }

        .nav-item {
            padding: 0.75rem 1rem;
            border-radius: var(--radius);
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 500;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
        }

        .nav-item i {
            width: 20px;
            height: 20px;
        }

        .nav-item:hover {
            background: #f1f5f9;
            color: var(--text-main);
        }

        .nav-item.active {
            background: white;
            color: var(--primary);
            box-shadow: var(--shadow);
        }

        /* Conteúdo Central */
        .content-area {
            display: none;
            flex-direction: column;
            gap: 1.5rem;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content-area.active {
            display: flex;
        }

        .content-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
        }

        .content-card h2 {
            margin: 0 0 1rem 0;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-main);
        }

        /* Posts */
        .post-box {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.25rem;
            box-shadow: var(--shadow);
        }

        textarea {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 1rem;
            font-family: inherit;
            resize: none;
            background: #f8fafc;
            margin: 1rem 0;
        }

        textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
        }

        .btn-post {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-post:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-post:active {
            background: var(--primary-hover);
            transform: translateY(1px);
        }

        .post {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.25rem;
            box-shadow: var(--shadow);
        }

        .post-user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .avatar {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #0d9488, #2dd4bf);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .post-content {
            font-size: 1rem;
            color: #334155;
        }

        /* Contatos Sidebar */
        .sidebar-right {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            height: fit-content;
            position: sticky;
            top: 5rem;
            padding: 1rem 0;
            box-shadow: var(--shadow);
        }

        .sidebar-title {
            padding: 0 1.25rem 0.75rem;
            font-weight: 700;
            font-size: 0.8rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .contact-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .contact-item {
            padding: 0.75rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
        }

        .contact-item:hover {
            background: #f1f5f9;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .online { background: #22c55e; }
        .offline { background: #cbd5e1; }

        /* Grid de vídeos/fotos */
        .grid-modern {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 0.5rem;
        }

        .grid-item {
            aspect-ratio: 1;
            background: #f1f5f9;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            color: var(--text-muted);
            cursor: pointer;
        }

        .grid-item:hover {
            background: #e2e8f0;
        }

        @media (max-width: 1100px) {
            .container {
                grid-template-columns: 80px 1fr;
            }
            .sidebar-right, .nav-text {
                display: none;
            }
            .nav-item {
                justify-content: center;
                padding: 1rem;
            }
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                padding: 0 1rem;
            }
            .sidebar-left {
                display: none;
            }
            .search-container {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header class="top-bar">
        <div class="logo-area" onclick="showTab('feed')">
            <h1>likestorm</h1>
        </div>
        
        <div class="search-container">
            <div class="search-bar">
                <i data-lucide="search" class="search-icon" style="width: 18px;"></i>
                <input type="text" placeholder="Pesquisar contatos, grupos ou mensagens...">
            </div>
        </div>

        <nav class="user-nav">
            <a href="#" class="active">Explorar</a>
            <a href="#">Perfil</a>
            <a href="#" class="btn-logout">Sair</a>
        </nav>
    </header>

    <main class="container">
        <!-- Menu Lateral -->
        <aside class="sidebar-left">
            <div class="nav-item active" onclick="showTab('feed', this)">
                <i data-lucide="home"></i> <span class="nav-text">Início</span>
            </div>
            <div class="nav-item" onclick="showTab('mensagens', this)">
                <i data-lucide="message-square"></i> <span class="nav-text">Mensagens</span>
            </div>
            <div class="nav-item" onclick="showTab('videos', this)">
                <i data-lucide="play-circle"></i> <span class="nav-text">Vídeos</span>
            </div>
            <div class="nav-item" onclick="showTab('jogos', this)">
                <i data-lucide="gamepad-2"></i> <span class="nav-text">Jogos</span>
            </div>
            <div class="nav-item" onclick="showTab('musica', this)">
                <i data-lucide="music"></i> <span class="nav-text">Músicas</span>
            </div>
            <div class="nav-item" onclick="showTab('galeria', this)">
                <i data-lucide="image"></i> <span class="nav-text">Galeria</span>
            </div>
            <div class="nav-item" onclick="showTab('definicoes', this)">
                <i data-lucide="settings"></i> <span class="nav-text">Definições</span>
            </div>
        </aside>

        <!-- Seções de Conteúdo -->
        <section id="main-content">
            
            <!-- FEED -->
            <div id="feed" class="content-area active">
                <div class="post-box">
                    <div style="font-weight: 700; color: var(--text-main);">O que você está pensando?</div>
                    <textarea rows="3" placeholder="Compartilhe algo com seus amigos..."></textarea>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; gap: 0.5rem; color: var(--text-muted);">
                            <i data-lucide="image" style="width: 20px; cursor: pointer;"></i>
                            <i data-lucide="paperclip" style="width: 20px; cursor: pointer;"></i>
                            <i data-lucide="map-pin" style="width: 20px; cursor: pointer;"></i>
                        </div>
                        <button class="btn-post">Publicar</button>
                    </div>
                </div>

                <article class="post">
                    <div class="post-user-info">
                        <div class="avatar">JS</div>
                        <div>
                            <div style="font-weight: 700;">jaosilva1123</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">Há 10 minutos • Público</div>
                        </div>
                    </div>
                    <div class="post-content">
                        Acabei de chegar ao LIM! Alguém para jogar uma partida rápida de xadrez? ♟️ <span style="color: var(--primary)">#XadrezOnline</span>
                    </div>
                </article>

                <article class="post">
                    <div class="post-user-info">
                        <div class="avatar" style="background: #a855f7;">MP</div>
                        <div>
                            <div style="font-weight: 700;">marii_pet</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">Há 20 minutos</div>
                        </div>
                    </div>
                    <div class="post-content">
                        Gatos são como poeira, entra em qualquer lugar... 🐈
                    </div>
                </article>
            </div>

            <!-- MENSAGENS -->
            <div id="mensagens" class="content-area">
                <div class="content-card">
                    <h2>Mensagens</h2>
                    <div class="grid-modern" style="margin-bottom: 2rem;">
                        <div class="grid-item">Amigo 1</div>
                        <div class="grid-item">Amigo 2</div>
                        <div class="grid-item">Amigo 3</div>
                        <div class="grid-item">Grupo VIP</div>
                        <div class="grid-item">Devs</div>
                        <div class="grid-item">+</div>
                    </div>
                    <div style="text-align: center; padding: 2rem; color: var(--text-muted);">
                        <i data-lucide="mail" style="width: 48px; height: 48px; margin-bottom: 1rem; opacity: 0.5;"></i>
                        <p>Selecione uma conversa para começar</p>
                        <button class="btn-post" style="margin-top: 1rem;">Nova Conversa</button>
                    </div>
                </div>
            </div>

            <!-- DEFINIÇÕES (EXEMPLO DE CONFIG) -->
            <div id="definicoes" class="content-area">
                <div class="content-card">
                    <h2>Configurações do LIM</h2>
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; border-bottom: 1px solid var(--border);">
                            <div>
                                <div style="font-weight: 600;">Modo Escuro</div>
                                <div style="font-size: 0.8rem; color: var(--text-muted);">Ajusta a interface para ambientes escuros</div>
                            </div>
                            <div style="width: 40px; height: 20px; background: #cbd5e1; border-radius: 20px; cursor: pointer;"></div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; border-bottom: 1px solid var(--border);">
                            <div>
                                <div style="font-weight: 600;">Notificações Desktop</div>
                                <div style="font-size: 0.8rem; color: var(--text-muted);">Receba alertas mesmo com o app em segundo plano</div>
                            </div>
                            <div style="width: 40px; height: 20px; background: var(--primary); border-radius: 20px; cursor: pointer; position: relative;">
                                <div style="position: absolute; right: 2px; top: 2px; width: 16px; height: 16px; background: white; border-radius: 50%;"></div>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; border-bottom: 1px solid var(--border);">
                            <div>
                                <div style="font-weight: 600;"><a style="text-decoration: none;color: var(--text-main);" href="../index.html">Voltar pro modo Legado (Web 2.0)</a></div>
                                <div style="font-size: 0.8rem; color: var(--text-muted);">Prefere o gosto da web antiga?</div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>

        </section>

        <!-- Barra de Contactos -->
        <aside class="sidebar-right">
            <div class="sidebar-title">Contatos Ativos</div>
            <ul class="contact-list">
                <li class="contact-item">
                    <div class="status-dot online"></div>
                    <span style="font-size: 0.9rem; font-weight: 500;">rickkolv</span>
                </li>
                <li class="contact-item">
                    <div class="status-dot online"></div>
                    <span style="font-size: 0.9rem; font-weight: 500;">thegamerana</span>
                </li>
                <li class="contact-item">
                    <div class="status-dot offline"></div>
                    <span style="font-size: 0.9rem; color: var(--text-muted);">peddrsnt</span>
                </li>
                <li class="contact-item">
                    <div class="status-dot online"></div>
                    <span style="font-size: 0.9rem; font-weight: 500;">priscii</span>
                </li>
            </ul>
        </aside>
    </main>

    <footer style="text-align: center; padding: 2rem; color: var(--text-muted); font-size: 0.85rem;">
        &copy; 2026 LIM
    </footer>

    <script>
        // Inicializa ícones
        lucide.createIcons();

        function showTab(tabId, element) {
            // Esconde todas as áreas
            const contents = document.querySelectorAll('.content-area');
            contents.forEach(content => content.classList.remove('active'));

            // Remove active dos navs
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => item.classList.remove('active'));

            // Mostra a selecionada
            const activeContent = document.getElementById(tabId);
            if (activeContent) {
                activeContent.classList.add('active');
            }

            // Ativa o botão no menu
            if (element) {
                element.classList.add('active');
            } else {
                document.querySelector('.nav-item').classList.add('active');
            }
            
            // Re-renderiza ícones se necessário
            lucide.createIcons();
        }
    </script>
</body>
</html>