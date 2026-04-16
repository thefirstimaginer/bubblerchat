from django.shortcuts import render, redirect
from django.contrib.auth.models import User
from django.contrib import auth, messages
from django.http import HttpResponse
from .models import Profile

# Create your views here.

def index(request):
	return render(request, 'index.html')

def challenge(request):
    if request.method == 'POST':
        # --- LÓGICA DE LOGIN ---
        if 'login' in request.POST:
            usuario_post = request.POST['username']
            senha_post = request.POST['password']

            user = auth.authenticate(username=usuario_post, password=senha_post)

            if user is not None:
                auth.login(request, user)
                return redirect('index') # Mude para sua página inicial
            else:
                messages.error(request, 'Usuário ou senha inválidos.')
                return redirect('challenge')

        # --- LÓGICA DE CADASTRO ---
        elif 'register' in request.POST:
            username = request.POST['username']
            email = request.POST['email']
            password = request.POST['password']
            confirm_password = request.POST['confirm_password']

            if password == confirm_password:
                if User.objects.filter(email=email).exists():
                    messages.info(request, 'Email já usado!')
                elif User.objects.filter(username=username).exists():
                    messages.info(request, 'Nome de Usuário já usado!')
                else:
                    user = User.objects.create_user(username=username, email=email, password=password)
                    user.save()

                    new_profile = Profile.objects.create(user=user, id_user=user.id)
                    new_profile.save()

                    auth.login(request, user) # Loga o usuário após criar
                    return redirect('index')
            else:
                messages.info(request, 'Senhas não coincidem!')
            
            return redirect('challenge') # Redireciona de volta para a mesma página em caso de erro

    # Se for GET, apenas renderiza a página
    return render(request, 'challenge.html')

def help(request):
	return render(request, 'help.html')