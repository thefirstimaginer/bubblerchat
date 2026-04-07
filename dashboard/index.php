<!--dashboard/index.php-->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

    include("../private/connection/autoload.php");

    $user_data = check_login($con);
    $user_nickname = $user_data['user_nickname'];

    $selectedUser = '';
    $initialTab = 'feed';

    if (isset($_GET['user'])) {
        $selectedUser = mysqli_real_escape_string($con, $_GET['user']);
        $showChatBox = true;
        $initialTab = 'mensagens';
    } else {
        $showChatBox = false;
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIM | Dashboard</title>
    <link rel="icon" href="http://localhost/p_lim_images/faviconb.ico">
    <link rel="stylesheet" href="../private/styles/dashboard-styles.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <header class="top-bar">
        <div class="logo-area" style="text-align:center;">
            <h1 onclick="showTab('feed')">likestorm</h1>
            <p>likestorm webspace&trade;</p>
        </div>
        
        <div class="search-container">
            <div class="search-bar">
                <i data-lucide="search" class="search-icon" style="width: 18px"></i>
                <input type="text" placeholder="Pesquisar no LIM...">
            </div>
        </div>

        <nav class="user-nav">
            <!--<a onclick="showTab('feed')">Início</a>-->
            <p>Olá, <?php echo $user_data['user_nickname']?></p>
            <a onclick="showTab('profile')">Perfil</a>
            <a href="../logout/">Sair</a>
        </nav>
    </header>

    <main class="container">
        <!-- Menu Lateral -->
        <aside class="sidebar-left">
            <div class="nav-item <?php echo ($initialTab == 'feed') ? 'active' : ''; ?>" id="menu-feed" onclick="showTab('feed', this)">
                <i data-lucide="house" class="sidebar-left-icon" style="width: 18px"></i>
                <span class="sidebar-left-text">Início</span>
            </div>

                <div class="nav-item" <?php echo ($initialTab == 'mensagens')?  'active' : '';  ?> onclick="showTab('mensagens', this)">
                    <i data-lucide="message-square-more" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Mensagens</span>
                </div>

                <div class="nav-item" onclick="showTab('posts', this)">
                    <i data-lucide="square-pen" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Posts</span>
                </div>

                <div class="nav-item" onclick="showTab('videos', this)">
                    <i data-lucide="clapperboard" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Vídeos</span>
                </div>

                <div class="nav-item" onclick="showTab('aovivo', this)">
                    <i data-lucide="video" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Ao-vivo</span>
                </div>

                <div class="nav-item" onclick="showTab('jogos', this)">
                    <i data-lucide="gamepad-2" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Jogos</span>
                </div>

                <div class="nav-item" onclick="showTab('musica', this)">
                    <i data-lucide="music" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Música</span>
                </div>

                <div class="nav-item" onclick="showTab('galeria', this)">
                    <i data-lucide="image" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Galeria</span>
                </div>

                <div class="nav-item" onclick="showTab('lim-books', this)">
                    <i data-lucide="library-big" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Livros</span>
                </div>

                <div class="nav-item" onclick="showTab('forums', this)">
                    <i data-lucide="messages-square" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Fóruns</span>
                </div>

                <div class="nav-item" onclick="showTab('grupos', this)">
                    <i data-lucide="users" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Grupos</span>
                </div>

                <div class="nav-item" onclick="showTab('biblioteca', this)">
                    <i data-lucide="book-copy" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Comunidades</span>
                </div>

                <div class="nav-item" onclick="showTab('definicoes', this)">
                    <i data-lucide="settings" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Definições</span>
                </div>

                <div class="nav-item" onclick="showTab('perfil', this)">
                    <i data-lucide="user-cog" class="sidebar-left-icon" style="width: 18px"></i>
                    <span class="sidebar-left-text">Perfil de <?php echo $user_data['user_nickname']?></span>
                </div>
        </aside>

        <!-- Seções de Conteúdo Central -->
        <section id="main-content">
            
            <!-- ABA: FEED -->
            <div id="feed" class="content-area <?php echo ($initialTab == 'feed') ? 'active' : ''; ?>">
                <div class="content-card">
                    <h2>Início<br><div class="content-card-header">Encontre ou converse com pessoas na Like.Me!</div></h2>
                        

                    <div class="recent_contacts">
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo1</div>
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo2</div>
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo3</div>
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo4</div>
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo5</div>
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo6</div>
                    </div>
                </div>

                <article class="post">
                    <div class="post-user-info">
                        <div class="avatar-small"></div>
                        <div>
                            <div style="font-weight: bold; color: #3b5998;">jaosilva1123@lim.com</div>
                            <div style="font-size: 0.75rem; color: #999;">Há 10 minutos</div>
                        </div>
                    </div>
                    <div class="post-content">
                        Acabei de chegar ao LIM! Alguém para jogar uma partida rápida de xadrez? ♟️ #PreguiçaTotal
                    </div>
                </article>

                <article class="post">
                    <div class="post-user-info">
                        <div class="avatar-small"></div>
                        <div>
                            <div style="font-weight: bold; color: #3b5998;">marii_pet@lim.com</div>
                            <div style="font-size: 0.75rem; color: #999;">Há 20 minutos</div>
                        </div>
                    </div>
                    <div class="post-content">
                        Gatos são como poeira, entra em qualquer lugar...
                    </div>
                </article>
                <article class="post">
                    <div class="post-user-info">
                        <div class="avatar-small"></div>
                        <div>
                            <div style="font-weight: bold; color: #3b5998;">thegamerana@lim.com</div>
                            <div style="font-size: 0.75rem; color: #999;">Há 2 Horas</div>
                        </div>
                    </div>
                    <div class="post-content">
                        Review da Live do LazyIM ontem: "Simplesmente incrível! A interface retrô traz uma nostalgia única, e a comunidade é super acolhedora. Mal posso esperar pela próxima sessão!" 🎮✨
                    </div>
                </article>
            </div>

            <!-- ABA: MENSAGENS -->
            <div id="mensagens" class="content-area <?php echo ($initialTab == 'mensagens') ? 'active' : ''; ?>">
                <div class="content-card">
                    <h2>Mensagens</h2>
                    <h3 id="subtext">Contatos Recentes</h3>
                    <div class="recent_contacts">
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo1</div>
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo1</div>
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo1</div>
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo1</div>
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo1</div>
                        <div style="min-width:6rem; height:6rem; background:#444; border-radius:8px; color:white; display:flex; align-items:center; justify-content:center;">Amigo1</div>
                    </div>
                </div>

                <div class="content-card">
                    <h2>Suas Conversas</h2>
                    <p>Pessoas online na rede</p>
                    <!--<button class="btn-post">Nova Mensagem</button>-->
                    <?php

                        $query = "select user_nickname from lim_users where user_nickname != '$user_nickname'";

                        $result = mysqli_query($con, $query);

                        if($result && mysqli_num_rows($result) > 0){
                            while ($row = $result->fetch_assoc()) {
                                // code...
                                $user = ucfirst($row['user_nickname']);
                                echo "<li class='lim_users_list'><a href='?user=$user'>$user</a></li>";
                            }
                        }
                    ?>
                </div>
            </div>

            <!--ABA: POSTS-->
            <div id="posts" class="content-area" method="POST">
                <div class="content-card">
                    <h2>Posts<br><div class="content-card-header">Poste ou compartilhe qualquer coisa na rede!</div></h2>

                    <legend>Título</legend>
                    <textarea rows="1" placeholder="O que sua mente mandar..."></textarea>
                    <br>
                    <br>
                    <legend>Assunto</legend>
                    <textarea rows="3" placeholder="Seja criativo!"></textarea>
                    <div class="post-actions">
                        <button class="btn-post">Publicar</button>
                    </div>
                </div>
                <div class="content-card">

                    <div class="recent_contacts">
                        <div style="width:6rem;height: 6rem;background-color: #444;border-radius: 8px;">Amigo1</div>
                        <div style="width:6rem;height: 6rem;background-color: #444;border-radius: 8px;">Amigo1</div>
                        <div style="width:6rem;height: 6rem;background-color: #444;border-radius: 8px;">Amigo1</div>
                        <div style="width:6rem;height: 6rem;background-color: #444;border-radius: 8px;">Amigo1</div>
                        <div style="width:6rem;height: 6rem;background-color: #444;border-radius: 8px;">Amigo1</div>
                        <div style="width:6rem;height: 6rem;background-color: #444;border-radius: 8px;">Amigo1</div>
                    </div>
                </div>

                <div class="content-card">
                    <h2>Postagens Recentes</h2>
                    <p>Você não tem novas postagens no momento.</p>
                    <button class="btn-post">Nova Mensagem</button>
                </div>
            </div>

            <!-- ABA: VÍDEOS -->
            <div id="videos" class="content-area">
                <div class="content-card">
                    <h2>Vídeos na LIM</h2>
                    <p>Confira o que está rolando ao vivo agora na rede.</p>
                </div>
                <div class="post-box">
                <div class="post-header">Categorias</div>
                <div class="categories_selection">
                    <button class="btn-post">Principais</button>
                    <button class="btn-post">Tutoriais</button>
                    <button class="btn-post">Gameplay</button>
                    <button class="btn-post">Vlogs</button>
                    <button class="btn-post">Música</button>
                    <button class="btn-post">Comédia</button>
                </div>
                </div>
            </div>

            <!-- ABA: AO-VIVO -->
            <div id="aovivo" class="content-area">
                <div class="content-card">
                    <h2>Lives ao vivo na LIM</h2>
                    <p>Confira o que está rolando ao vivo agora na rede.</p>
                    <div style="background: #000; height: 200px; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: white;">
                        [Reprodutor de Vídeo Retrô]
                    </div>
                </div>
            </div>

            <!-- ABA: JOGOS -->
            <div id="jogos" class="content-area">
                <div class="content-card">
                    <h2>Central de Jogos LIM</h2>
                    <p>Desafie seus amigos em clássicos instantâneos.</p>
                    <ul style="list-style: none; padding: 0;">
                        <li style="padding: 10px; border-bottom: 1px solid #eee;">♟️ Xadrez Rápido</li>
                        <li style="padding: 10px; border-bottom: 1px solid #eee;">🃏 Paciência Online</li>
                        <li style="padding: 10px;">🧱 Tetris Lazy Edition</li>
                    </ul>
                </div>
            </div>

            <!-- ABA: MUSICA -->
            <div id="musica" class="content-area">
                <div class="content-card">
                    <h2>Músicas na LIM</h2>
                    <p>Relaxe e curta as produções de milhares de pessoas!</p>
                    <div style="background: #000; height: 200px; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: white;">
                        [Reprodutor de Vídeo Retrô]
                    </div>
                </div>
            </div>

            <!-- ABA: GALERIA -->
            <div id="galeria" class="content-area">
                <div class="content-card">
                    <h2>Galeria da LIM</h2>
                    <p>Veja seus albums e fotos favoritos, públicos ou não</p>
                    <div style="background: #000; height: 200px; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: white;">
                        [Reprodutor de Vídeo Retrô]
                    </div>
                </div>
            </div>

            <!-- ABA: BIBLIOTECA -->
            <div id="biblioteca" class="content-area">
                <div class="content-card">
                    <h2>Sua Biblioteca</h2>
                    <p>Arquivos, fotos e mídias salvas na sua conta.</p>
                </div>
            </div>

            <!-- ABA: DEFINIÇÕES -->
            <div id="definicoes" class="content-area">
                <div class="content-card">
                    <h2>Configurações</h2>
                    <p>Gerencie sua privacidade e aparência do Dashboard.</p>
                    <ul style="list-style-type: square;">
                        <li><a style="text-decoration: none; color: #3b5998;"href="./m/index.html">Modo Moderno - "Web 3.0" (BETA)</a></li>
                        <li>Ativar modo Flat</li>
                        <li>Modificar meus LIMStickers</li>
                        <li>Configurações de Contatos</li>
                        <li>Teste</li>
                        <li>Teste</li>
                        <li>Teste</li>
                        <br>
                        <li><- Sair</li>
                    </ul>
                </div>
            </div>

            <!-- ABA: PERFIL -->
            <div id="perfil" class="content-area">
                <div class="content-card">
                    <div class="profile-header-container">
                        <h2>Perfil de <?php echo $user_data['user_nickname']?></h2>

                        <div style="width:6rem; height: 6rem; background-color: #444; border-radius: 8px; color:white; font-display:flex; align-items:center; justify-content:center;">
                        Amigo1
                        </div>
                    </div>

                    <p>Gerencie sua privacidade e aparência do Dashboard.</p>
                    <ul style="list-style-type: none;">
                        <li><a style="text-decoration: none; color: #3b5998;" href="#">Ativar modo flat</a></li>
                        <li><a style="text-decoration: none; color: #3b5998;" href="#">Configurar LIM Stickers</a></li>
                        <li><a style="text-decoration: none; color: #3b5998;" href="#">Configurar LIM Game Central ID</a></li>
                        <li><a style="text-decoration: none; color: #3b5998;" href="#">Configurar o player de vídeo</a></li>
                        <li><a style="text-decoration: none; color: #3b5998;" href="#">Configurar Mensagens</a></li>
                        <li><a style="text-decoration: none; color: #3b5998;" href="#">Baixar o cliente Desktop</a></li>
                        <br>
                        <li><a style="text-decoration: none; color: #3b5998;"href="../logout/">SAIR</a></li>
                    </ul>
                </div>
            </div>
        </section>

         <!-- Sidebar Direita Dinâmica -->
        <aside class="sidebar-right" id="dynamic-sidebar">

            <!--Painel de Feed-->
            <div id="panel-home">
                <div class="sidebar-title">Destaques na LIM!</div>
                <ul class="contact-list">
                    <li class="contact-item"><div class="status-online"></div> rickhjghj@lim.com</li>
                    <li class="contact-item"><div class="status-online"></div> thegamerana@lim.com</li>
                    <li class="contact-item"><div class="status-online" style="background:#ccc;"></div> peddrsnt@lim.com</li>
                    <li class="contact-item"><div class="status-online"></div> menndx6744@lim.com</li>
                    <li class="contact-item"><div class="status-online"></div> priscii@lim.com</li>
                </ul>
            </div>

            <!-- Painel de Mensagens (Submenus) -->
            <div id="panel-messages" style="display: none;">

                <div class="sidebar-title">Amigos Online (5)</div>
                <ul class="contact-list">
                    <?php
                        $query = "select user_nickname from lim_users where user_nickname != '$user_nickname'";

                        $result = mysqli_query($con, $query);

                        if($result && mysqli_num_rows($result) > 0){
                            while ($row = $result->fetch_assoc()) {
                                // code...
                                $user = $row['user_nickname'];
                                $user = ucfirst($user);
                                echo "<li class='contact-item'><div class='status-online'></div><a href='?user=$user'>$user</a></li>";
                            }
                        }
                    ?>
                </ul>

                <div class="sidebar-title">Menu de Mensagens</div>
                <ul class="submenu-list" style="list-style-type: none;">

                    <li class="submenu-item">
                        <i data-lucide="chart-spline" class="sidebar-left-icon" style="width: 18px"></i>
                        Tendências
                    </li>

                    <li class="submenu-item">
                        <i data-lucide="history" class="sidebar-left-icon" style="width: 18px"></i>
                        Histórico
                    </li>
                    
                    <li class="submenu-item"><span class="video-submenu-icon">📁</span> Meus Vídeos</li>
                    <li class="submenu-item"><span class="video-submenu-icon">⭐</span> Favoritos</li>
                    <li class="submenu-item" style="margin-top: 10px; border-top: 1px solid #ddd; font-weight: bold; color: #0d9488;">
                        <span class="video-submenu-icon">➕</span> Enviar Vídeo
                    </li>
                </ul>

                <div class="sidebar-title" style="border-top: 1px solid #ddd; margin-top: 5px;">LIM'ers sugeridos</div>
                <ul class="submenu-list">
                    <li class="submenu-item">Culinária Lazy</li>
                    <li class="submenu-item">Retro Dev</li>
                </ul>
            </div>

            <!-- Painel de Vídeos (Submenus) -->
            <div id="panel-videos" style="display: none;">
                <div class="sidebar-title">Menu de Vídeos</div>
                <ul class="submenu-list" style="list-style-type: none;">

                    <li class="submenu-item">
                        <i data-lucide="chart-spline" class="sidebar-left-icon" style="width: 18px"></i>
                        Tendências
                    </li>

                    <li class="submenu-item">
                        <i data-lucide="history" class="sidebar-left-icon" style="width: 18px"></i>
                        Histórico
                    </li>
                    
                    <li class="submenu-item"><span class="video-submenu-icon">📁</span> Meus Vídeos</li>
                    <li class="submenu-item"><span class="video-submenu-icon">⭐</span> Favoritos</li>
                    <li class="submenu-item" style="margin-top: 10px; border-top: 1px solid #ddd; font-weight: bold; color: #0d9488;">
                        <span class="video-submenu-icon">➕</span> Enviar Vídeo
                    </li>
                </ul>
                <div class="sidebar-title" style="border-top: 1px solid #ddd; margin-top: 5px;">Canais Seguidos</div>
                <ul class="submenu-list">
                    <li class="submenu-item">Culinária Lazy</li>
                    <li class="submenu-item">Retro Dev</li>
                </ul>
            </div>

            <!-- Painel de Perfil -->
            <div id="panel-profile" style="display: none;">
                <div class="sidebar-title">Minhas Coisas</div>
                <ul class="submenu-list" style="list-style-type: none;">

                    <li class="submenu-item">
                        Fotos
                    </li>

                    <li class="submenu-item">
                        Lives
                    </li>
                    
                    <li class="submenu-item">Meus Vídeos</li>
                    <li class="submenu-item">Favoritos</li>
                    <li class="submenu-item">Enviar Vídeo</li>
                </ul>
                <div class="sidebar-title" style="border-top: 1px solid #ddd; margin-top: 5px;">Canais Seguidos</div>
                <ul class="submenu-list">
                    <li class="submenu-item">Culinária Lazy</li>
                    <li class="submenu-item">Retro Dev</li>
                </ul>
            </div>

        </aside>

        <!--Chatbox-->
        <?php if ($showChatBox): ?>
            <div class="chat-box" id="chat-box">
                
                <div class="chat-box-header">
                    <h2><?php echo ucfirst($selectedUser); ?></h2>
                    <button class="close-btn" onclick="closeChat()">[X]</button>
                </div>
                <div class="chat-box-body" id="chat-box-body">
                    <!--Chat Messages will appear here-->
                </div>
                <form class="chat-form" id="chat-form">
                    <input type="hidden" id="sender" value="<?php echo $user_nickname; ?>">
                    <input type="hidden" id="receiver" value="<?php echo $selectedUser; ?>">
                    <input type="text" id="message" placeholder="Digite algo..." required>
                    <input class="btn-post" type="submit" value="Enviar">
                </form>

            </div>
        <?php endif; ?>
    </main>

    <footer style="text-align: center; padding: 1rem; color: #888; font-size: 0.8rem;">
        © 2025-2026 LIM
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>

        lucide.createIcons();

        function showTab(tabId, element) {
            // 1. Alternar Áreas de Conteúdo
            document.querySelectorAll('.content-area').forEach(c => c.classList.remove('active'));
            const activeContent = document.getElementById(tabId);
            if (activeContent) activeContent.classList.add('active');

            // 2. Alternar Menu Lateral
            document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
            const targetNav = element || document.getElementById('nav-' + tabId);
            if (targetNav) targetNav.classList.add('active');

            // 3. Alternar Painéis da Direita (Mapeamento)
            const panelMap = {
                'feed': 'panel-home',
                'mensagens': 'panel-messages',
                'videos': 'panel-videos',
                'perfil': 'panel-profile'
            };

            document.querySelectorAll('.sidebar-right > div').forEach(p => p.style.display = 'none');
            
            const panelId = panelMap[tabId] || 'panel-home';
            const targetPanel = document.getElementById(panelId);
            if (targetPanel) targetPanel.style.display = 'block';

            // Atualizar ícones se necessário
            if(window.lucide) lucide.createIcons();
        }

        function closeChat(){
            const cb = document.getElementById('chat-box');
            if(cb) cb.style.display = "none";
        }

        function scrollChatToBottom() {
            var chatBox = $('#chat-box-body');
            chatBox.scrollTop(chatBox.prop("scrollHeight"));
        }

        // EXECUÇÃO AO CARREGAR:
        // Usa a variável PHP para definir qual aba abrir imediatamente
        window.onload = function() {
            const initialTab = "<?php echo $initialTab; ?>";
            showTab(initialTab);
        };

        function fetchMessages(){
            var sender = $('#sender').val();
            var receiver = $('#receiver').val();

            $.ajax({
                url: '../private/connection/fetch_messages.php',
                type: 'POST',
                data: {sender: sender, receiver: receiver},
                success: function(data) {
                    $('#chat-box-body').html(data);
                    scrollChatToBottom();
                }
            });
        }

        $(document).ready(function() {
            //procura as mensagens a cada 3 segundos

            fetchMessages();
            setInterval(fetchMessages, 3000);
        });

        //Envia a mensagem
        $('#chat-form').submit(function(e) {
            e.preventDefault();
            var sender = $('#sender').val();
            var receiver = $('#receiver').val();
            var message = $('#message').val();

            $.ajax({
                url: '../private/connection/submit_messages.php',
                type: 'POST',
                data: {sender: sender, receiver: receiver, message: message},
                success: function(response) {
                    console.log("Resposta do servidor:", response);
                    $('#message').val('');
                    fetchMessages();
                },
                error: function(xhr, status, error) {
                    console.error("Erro no AJAX:", error);
                }
            });
        });

    </script>
</body>
</html>
