from django.shortcuts import render

# Create your views here.
def home(request):
 return render(request,'website/homepage.html')

def login(request):
 return render(request,'website/login.html')


def signup(request):
 return render(request,'website/signup.html')