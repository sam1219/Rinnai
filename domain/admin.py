from django.contrib import admin
from .models import TestModel, GasType, TesterUser, Destination, DvTable, RhefTable

# Register your models here.
admin.site.register(TesterUser)
admin.site.register(TestModel)
admin.site.register(GasType)
admin.site.register(Destination)
admin.site.register(DvTable)
admin.site.register(RhefTable)
