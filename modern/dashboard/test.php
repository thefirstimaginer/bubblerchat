<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIM | Dashboard</title>
    <!-- Tailwind CSS para estilização moderna -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons para ícones consistentes -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Fira+Sans:wght@400;700&display=swap');
        
        body {
            font-family: 'Alan Sans', sans-serif;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <!-- 1. BARRA LATERAL ESQUERDA (NAVEGAÇÃO) -->
        <aside class="w-20 lg:w-64 bg-white border-r border-slate-200 flex flex-col py-6">
            <!-- Logo -->
            <div class="px-6 mb-8 flex items-center gap-2">
                <span style=".text-2xl{font-size: 1.9rem;}" class="hidden lg:block text-2xl font-extrabold text-teal-600 tracking-tighter">LIM</span>
            </div>

            <!-- Links de Navegação -->
            <nav class="flex-1 px-3 space-y-2">
                <button class="w-full flex items-center gap-3 px-3 py-3 rounded-xl bg-teal-50 text-teal-600 transition-all font-semibold">
                    <i data-lucide="home" class="w-5 h-5"></i>
                    <span class="hidden lg:block">Início</span>
                </button>
                <button class="w-full flex items-center gap-3 px-3 py-3 rounded-xl text-slate-500 hover:bg-slate-100 transition-all font-semibold">
                    <i data-lucide="message-square" class="w-5 h-5"></i>
                    <span class="hidden lg:block">Conversas</span>
                </button>
                <button class="w-full flex items-center gap-3 px-3 py-3 rounded-xl text-slate-500 hover:bg-slate-100 transition-all font-semibold">
                    <i data-lucide="tv" class="w-5 h-5"></i>
                    <span class="hidden lg:block">Vídeo / Salas</span>
                </button>
                <button class="w-full flex items-center gap-3 px-3 py-3 rounded-xl text-slate-500 hover:bg-slate-100 transition-all font-semibold">
                    <i data-lucide="music" class="w-5 h-5"></i>
                    <span class="hidden lg:block">Música</span>
                </button>
                <button class="w-full flex items-center gap-3 px-3 py-3 rounded-xl text-slate-500 hover:bg-slate-100 transition-all font-semibold">
                    <i data-lucide="gamepad-2" class="w-5 h-5"></i>
                    <span class="hidden lg:block">Jogos</span>
                </button>
                <button class="w-full flex items-center gap-3 px-3 py-3 rounded-xl text-slate-500 hover:bg-slate-100 transition-all font-semibold">
                    <i data-lucide="book-open" class="w-5 h-5"></i>
                    <span class="hidden lg:block">Biblioteca</span>
                </button>
            </nav>

            <!-- Rodapé da Sidebar -->
            <div class="px-3 border-t pt-4">
                <button class="w-full flex items-center gap-3 px-3 py-3 text-slate-500 hover:bg-slate-100 rounded-xl transition-all font-semibold">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    <span class="hidden lg:block">Definições</span>
                </button>
            </div>
        </aside>

        <!-- 2. CONTEÚDO PRINCIPAL (CENTRO) -->
        <main class="flex-1 flex flex-col min-w-0">
            
            <!-- Header Superior -->
            <header class="h-20 bg-white border-b border-slate-200 px-8 flex items-center justify-between">
                <!-- Barra de Procura -->
                <div class="relative w-96 hidden md:block">
                    <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 w-4 h-4"></i>
                    <input 
                        type="text" 
                        placeholder="Procurar amigos, vídeos ou música..." 
                        class="w-full pl-10 pr-4 py-2 bg-slate-100 border-none rounded-full text-sm focus:ring-2 focus:ring-teal-400 outline-none transition-all"
                    >
                </div>
                
                <!-- Perfil e Notificações -->
                <div class="flex items-center gap-4">
                    <button class="p-2 text-slate-400 hover:bg-slate-100 rounded-full relative transition-colors">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div class="flex items-center gap-3 ml-4 cursor-pointer group">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-bold group-hover:text-teal-600 transition-colors">proUser9493@lim.com</p>
                            <p class="text-xs text-slate-500 font-medium">Online - Há 2 Horas</p>
                        </div>
                        <img 
                            src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" 
                            class="w-10 h-10 rounded-full bg-teal-100 border-2 border-white shadow-sm"
                            alt="Avatar"
                        >
                    </div>
                </div>
            </header>

            <!-- Área de Conteúdo Dinâmico -->
            <div class="flex-1 overflow-y-auto p-6 md:p-8 custom-scrollbar">
                <div class="max-w-4xl mx-auto space-y-10">
                    
                    <!-- Nova Seção: O que está a acontecer? (Publicar) -->
                    <section class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
                        <div class="flex gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" class="w-10 h-10 rounded-full bg-slate-100" alt="Avatar">
                            <div class="flex-1">
                                <textarea placeholder="O que está a acontecer, Utilizador Pro?" class="w-full p-3 bg-slate-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-teal-400 outline-none resize-none h-20"></textarea>
                                <div class="flex justify-between items-center mt-3 pt-3 border-t border-slate-50">
                                    <div class="flex gap-2 text-slate-400">
                                        <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors"><i data-lucide="image" class="w-5 h-5"></i></button>
                                        <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors"><i data-lucide="music-2" class="w-5 h-5"></i></button>
                                        <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors"><i data-lucide="smile" class="w-5 h-5"></i></button>
                                    </div>
                                    <button class="bg-teal-500 text-white px-6 py-2 rounded-xl font-bold text-sm hover:bg-teal-600 transition-all shadow-md shadow-teal-100">Publicar</button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Feed de Atividade -->
                    <section>
                        <h2 class="text-2xl font-extrabold tracking-tight mb-6 flex items-center gap-2">
                            <i data-lucide="activity" class="text-teal-500 w-6 h-6"></i>
                            Atividade da Rede
                        </h2>
                        
                        <div class="space-y-6">
                            <!-- Post de Atividade 1: Música -->
                            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm group hover:shadow-md transition-all">
                                <div class="flex items-start justify-between">
                                    <div class="flex gap-3">
                                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ana" class="w-10 h-10 rounded-full bg-slate-100" alt="Ana">
                                        <div>
                                            <p class="text-sm font-bold">thegameranaa@lim.com <span class="text-slate-400 font-medium">começou a ouvir</span></p>
                                            <p class="text-xs text-slate-400 font-semibold">Há 5 minutos</p>
                                        </div>
                                    </div>
                                    <button class="text-slate-300 hover:text-slate-500"><i data-lucide="more-horizontal" class="w-5 h-5"></i></button>
                                </div>
                                <div class="mt-4 flex items-center gap-4 bg-slate-50 p-4 rounded-xl border border-slate-100">
                                    <div class="w-16 h-16 bg-teal-500 rounded-lg flex items-center justify-center text-white shadow-inner">
                                        <i data-lucide="music" class="w-8 h-8"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-800">Midnight City</h4>
                                        <p class="text-xs text-slate-500">M83 • Hurry Up, We're Dreaming</p>
                                    </div>
                                    <button class="ml-auto w-10 h-10 bg-white rounded-full flex items-center justify-center text-teal-500 shadow-sm hover:scale-110 transition-transform">
                                        <i data-lucide="play" class="w-4 h-4 fill-current"></i>
                                    </button>
                                </div>
                                <div class="mt-4 flex gap-4 text-slate-400">
                                    <button class="flex items-center gap-1.5 text-xs font-bold hover:text-teal-500 transition-colors"><i data-lucide="heart" class="w-4 h-4"></i> 12</button>
                                    <button class="flex items-center gap-1.5 text-xs font-bold hover:text-teal-500 transition-colors"><i data-lucide="message-circle" class="w-4 h-4"></i> 3</button>
                                </div>
                            </div>

                            <!-- Post de Atividade 2: Sala de Vídeo -->
                            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm group hover:shadow-md transition-all">
                                <div class="flex items-start justify-between">
                                    <div class="flex gap-3">
                                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Bruno" class="w-10 h-10 rounded-full bg-slate-100" alt="Bruno">
                                        <div>
                                            <p class="text-sm font-bold">brunoocst@lim.com <span class="text-slate-400 font-medium">abriu uma nova sala</span></p>
                                            <p class="text-xs text-slate-400 font-semibold">Há 20 minutos</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 text-sm text-slate-600">"Alguém quer assistir ao novo trailer comigo? Está épico!"</p>
                                <div class="mt-4 relative rounded-xl overflow-hidden aspect-video bg-slate-100">
                                    <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=800" class="w-full h-full object-cover" alt="Trailer">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <button class="bg-teal-500/90 text-white px-4 py-2 rounded-full font-bold text-xs flex items-center gap-2 backdrop-blur-sm hover:bg-teal-500 transition-all">
                                            <i data-lucide="users" class="w-4 h-4"></i> Entrar na Sala
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Seção de Salas (Originalmente existente, agora abaixo do feed) -->
                    <section>
                        <div class="flex items-center justify-between mb-5">
                            <h2 class="text-2xl font-extrabold tracking-tight">Salas Recomendadas</h2>
                            <button class="text-teal-600 text-sm font-bold hover:text-teal-700 transition-colors">Ver todas</button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="group relative bg-slate-900 rounded-2xl aspect-video overflow-hidden cursor-pointer shadow-xl shadow-slate-200/50">
                                <img src="https://images.unsplash.com/photo-1493225255756-d9584f8606e9?auto=format&fit=crop&w=600" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-500" alt="Sessão Cinema">
                                <div class="absolute inset-0 p-5 flex flex-col justify-between">
                                    <span class="bg-red-500 text-white text-[10px] font-bold px-2.5 py-1 rounded-md w-fit">AO VIVO</span>
                                    <div>
                                        <h3 class="text-white font-bold text-lg">Sessão Cinema: Interstellar</h3>
                                        <p class="text-slate-200 text-xs opacity-80">Sala de João Ramos • 12 amigos</p>
                                    </div>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-black/20">
                                    <i data-lucide="play-circle" class="text-white w-14 h-14"></i>
                                </div>
                            </div>

                            <div class="group relative bg-slate-900 rounded-2xl aspect-video overflow-hidden cursor-pointer shadow-xl shadow-slate-200/50">
                                <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=600" class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-500" alt="Lo-Fi Music">
                                <div class="absolute inset-0 p-5 flex flex-col justify-between">
                                    <span class="bg-teal-500 text-white text-[10px] font-bold px-2.5 py-1 rounded-md w-fit">MÚSICA</span>
                                    <div>
                                        <h3 class="text-white font-bold text-lg">Estudar com Lo-Fi</h3>
                                        <p class="text-slate-200 text-xs opacity-80">Pública • 154 ouvintes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>

        <!-- 3. BARRA LATERAL DIREITA (AMIGOS) -->
        <aside class="w-80 bg-white border-l border-slate-200 hidden xl:flex flex-col py-8 px-6">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-xl font-bold flex items-center gap-2">
                    <i data-lucide="users" class="text-teal-500 w-5 h-5"></i>
                    AMIGOS ONLINE (2)
                </h3>
                <button class="text-slate-400 hover:text-slate-600 transition-colors">
                    <i data-lucide="more-vertical" class="w-5 h-5"></i>
                </button>
            </div>

            <!-- Lista de Amigos -->
            <div class="flex-1 space-y-6 overflow-y-auto custom-scrollbar">
                <!-- Amigo 1 -->
                <div class="group flex items-center gap-3 cursor-pointer">
                    <div class="relative">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ana" class="w-11 h-11 rounded-full bg-slate-100 border border-slate-200 shadow-sm" alt="Ana">
                        <div class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full"></div>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold group-hover:text-teal-600 transition-colors">thegameranaa@lim.com</p>
                        <p class="text-[11px] text-slate-400 font-semibold truncate">A ouvir: Midnight City</p>
                    </div>
                </div>

                <!-- Amigo 2 -->
                <div class="group flex items-center gap-3 cursor-pointer">
                    <div class="relative">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Bruno" class="w-11 h-11 rounded-full bg-slate-100 border border-slate-200 shadow-sm" alt="Bruno">
                        <div class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full"></div>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold group-hover:text-teal-600 transition-colors">brunoocst@lim.com</p>
                        <p class="text-[11px] text-slate-400 font-semibold truncate">A ver: Trailer Épico</p>
                    </div>
                </div>

                <!-- Amigo 3 -->
                <div class="group flex items-center gap-3 cursor-pointer opacity-60">
                    <div class="relative">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Carla" class="w-11 h-11 rounded-full bg-slate-100 border border-slate-200 shadow-sm" alt="Carla">
                        <div class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-slate-300 border-2 border-white rounded-full"></div>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold group-hover:text-teal-600 transition-colors">diascarlaa@lim.com</p>
                        <p class="text-[11px] text-slate-400 font-semibold truncate">Inativa</p>
                    </div>
                </div>
            </div>

            <!-- Card de Dica -->
            <div class="mt-8">
                <div class="bg-teal-600 rounded-2xl p-5 text-white shadow-lg shadow-teal-100 relative overflow-hidden">
                    <div class="relative z-10">
                        <h4 class="font-bold mb-1 flex items-center gap-2">
                            <i data-lucide="sparkles" class="w-4 h-4"></i>
                            Dica da LIM
                        </h4>
                        <p class="text-xs opacity-90 leading-relaxed font-medium">
                            Sabia que pode sincronizar suas músicas com qualquer amigo apenas arrastando o perfil dele para a barra de música?
                        </p>
                    </div>
                    <!-- Círculo decorativo -->
                    <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-white/10 rounded-full"></div>
                </div>
            </div>
        </aside>

    </div>

    <!-- Script para renderizar os ícones do Lucide -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
