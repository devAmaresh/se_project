from django.db import models
from django.contrib.auth.models import AbstractUser
# Create your models here.

class UserProfile(AbstractUser):
    email = models.EmailField(unique=True)
    username = models.CharField(max_length=50, unique=True)
    first_name = models.CharField(max_length=50)
    last_name = models.CharField(max_length=50)
    password = models.CharField(max_length=50)
    is_active = models.BooleanField(default=True)
    is_staff = models.BooleanField(default=False)
    is_superuser = models.BooleanField(default=False)
    date_joined = models.DateTimeField(auto_now_add=True)
    last_login = models.DateTimeField(auto_now=True)
    address=models.CharField(max_length=100)
    phoneNumber = models.CharField(max_length=20)
    

    USERNAME_FIELD = 'email'
    REQUIRED_FIELDS = ['username', 'first_name', 'last_name']

    def __str__(self):
        return self.email
    

class Location(models.Model):
    latitude = models.FloatField()
    longitude = models.FloatField()
    address = models.CharField(max_length=255)

    def __str__(self):
        return self.address

class ParkingLotManager(models.Model):
    name = models.CharField(max_length=255)
    email = models.EmailField()
    phoneNumber = models.CharField(max_length=20)
    parkingLot = models.ForeignKey('ParkingLot', on_delete=models.CASCADE)

    def __str__(self):
        return self.email

class ParkingLot(models.Model):
    name = models.CharField(max_length=255)
    location = models.ForeignKey(Location, on_delete=models.CASCADE)
    capacity = models.IntegerField()
    currentAvailability = models.IntegerField()
    manager = models.ForeignKey(ParkingLotManager, on_delete=models.CASCADE)

    def __str__(self):
        return self.name

class ParkingSpace(models.Model):
    TYPE_CHOICES = (
        ('standard', 'Standard'),
        ('premium', 'Premium'),
    )
    STATUS_CHOICES = (
        ('available', 'Available'),
        ('occupied', 'Occupied'),
        ('reserved', 'Reserved'),
    )
    type = models.CharField(max_length=20, choices=TYPE_CHOICES)
    status = models.CharField(max_length=20, choices=STATUS_CHOICES)
    lot = models.ForeignKey(ParkingLot, on_delete=models.CASCADE)
    reservedFor = models.IntegerField()

class Vehicle(models.Model):
    plateNumber = models.CharField(max_length=20)
    type = models.CharField(max_length=50)
    ownerName = models.CharField(max_length=255)
    ownerContact = models.CharField(max_length=20)
    ownerAddress = models.CharField(max_length=255)

    def __str__(self):
        return self.plateNumber


class ParkingTicket(models.Model):
    startTime = models.DateTimeField()
    endTime = models.DateTimeField()
    amountPaid = models.FloatField()
    vehicle = models.ForeignKey(Vehicle, on_delete=models.CASCADE)
    parkingSpace = models.ForeignKey(ParkingSpace, on_delete=models.CASCADE)
    parkingLot = models.ForeignKey(ParkingLot, on_delete=models.CASCADE)
    transactionId = models.IntegerField()
    transactionStatus = models.CharField(max_length=20)
    user = models.ForeignKey(UserProfile, on_delete=models.CASCADE)

    def __str__(self):
        return str(self.transactionId)
