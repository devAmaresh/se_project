
from django.urls import path
from .import views
urlpatterns = [
    path('',views.home,name="home"),
    path('register',views.signup,name="signup"),
    path('login',views.login,name="login"),
    path('dashboard',views.dashboard,name="dashboard"),
    path('logout',views.logout,name="logout"),
    path('booking',views.booking,name="booking"),
]
