from django.shortcuts import render
from django.http import HttpResponse

# Create your views here.
def home(request):
	return HttpResponse('Bubblerchat v0.1')