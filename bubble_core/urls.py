from django.urls import path
from . import views

urlpatterns = [
	path('', views.index, name='index'),
	path('challenge/', views.challenge, name='challenge'),
	path('help/', views.help, name='help'),
]