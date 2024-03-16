from django.shortcuts import render, redirect
from django.contrib.auth import authenticate, login as auth_login, logout as auth_logout
from django.contrib.auth.decorators import login_required
from .models import UserProfile

def home(request):
    return render(request, 'website/homepage.html')

def login(request):
    if request.method == 'POST':
        email = request.POST.get('email')
        password = request.POST.get('password')
        user = authenticate(request, email=email, password=password)
        if user is not None:
            auth_login(request, user)
            return redirect('dashboard')  # Redirect to dashboard upon successful login
        else:
            # Handle invalid login
            error_message = 'Invalid email or password.'
            return render(request, 'website/login.html', {'error_message': error_message})
    return render(request, 'website/login.html')

def signup(request):
    if request.method == 'POST':
        username = request.POST.get('username')
        email = request.POST.get('email')
        password1 = request.POST.get('password1')
        password2 = request.POST.get('password2')

        if password1 != password2:
            error_message = 'Passwords do not match.'
            return render(request, 'website/signup.html', {'error_message': error_message})

        # Check if user with provided email already exists
        if UserProfile.objects.filter(email=email).exists():
            error_message = 'Email already exists.'
            return render(request, 'website/signup.html', {'error_message': error_message})

        # Create the user
        user = UserProfile.objects.create_user(username=username, email=email, password=password1)
        auth_login(request, user)
        return redirect('dashboard')  # Redirect to dashboard upon successful signup and login
    return render(request, 'website/signup.html')

@login_required
def dashboard(request):
    return render(request, 'dashboard/home_dash.html')

def logout(request):
    auth_logout(request)
    return redirect('home')  # Redirect to homepage after logout
