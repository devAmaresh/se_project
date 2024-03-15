from django.contrib import admin
from .models import Location, ParkingLotManager, ParkingLot, ParkingSpace, Vehicle, ParkingTicket,UserProfile

admin.site.register(UserProfile)
admin.site.register(Location)
admin.site.register(ParkingLotManager)
admin.site.register(ParkingLot)
admin.site.register(ParkingSpace)
admin.site.register(Vehicle)
admin.site.register(ParkingTicket)
