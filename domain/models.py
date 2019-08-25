from django.db import models


# Create your models here.

class TesterUser(models.Model):
    name = models.CharField(verbose_name="Tester Name", max_length=1000)
    password = models.CharField(verbose_name="Test Id", max_length=1000)

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = "Tester"
        verbose_name_plural = verbose_name


class TestModel(models.Model):
    name = models.CharField(max_length=1000, verbose_name="Model name")

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = "Model"
        verbose_name_plural = verbose_name


class Destination(models.Model):
    name = models.CharField(max_length=1000, verbose_name="Destination name")

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = "Destination"
        verbose_name_plural = verbose_name


class GasType(models.Model):
    name = models.CharField(max_length=1000, verbose_name="Gas Type")

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = "GasType"
        verbose_name_plural = verbose_name


class DvTable(models.Model):
    test_type = models.CharField(verbose_name="Type", max_length=1000, default='Dv Test', null=True, blank=True)
    test_id = models.CharField(max_length=1000, verbose_name="Test id", default='1')
    model = models.ForeignKey(TestModel, on_delete=models.CASCADE, verbose_name="Model")
    destination = models.ForeignKey(Destination, on_delete=models.CASCADE, verbose_name="Destination")
    gas_type = models.ForeignKey(GasType, on_delete=models.CASCADE, verbose_name="Gas Type")
    serial_no = models.CharField(max_length=100, verbose_name='SERIAL_NO', null=True, blank=True)
    gas_control_no = models.CharField(max_length=100, verbose_name='GAS_CONTROL_NO', null=True, blank=True)
    earth_continuity = models.CharField(max_length=100, verbose_name='EARTH_CONTINUITY', null=True, blank=True)
    insulation = models.CharField(max_length=100, verbose_name='INSULATION', null=True, blank=True)
    line_pressure = models.CharField(max_length=100, verbose_name='LINE_PRESSURE', null=True, blank=True)
    set_pressure_high = models.CharField(max_length=100, verbose_name='SET_PRESSURE_HIGH', null=True, blank=True)
    set_pressure_low = models.CharField(max_length=100, verbose_name='SET_PRESSURE_LOW', null=True, blank=True)
    stage_1_key = models.CharField(max_length=100, verbose_name='stage_1_key', null=True, blank=True)
    stage_1_value = models.CharField(max_length=100, verbose_name='stage_1_value', null=True, blank=True)
    stage_2_key = models.CharField(max_length=100, verbose_name='stage_2_key', null=True, blank=True)
    stage_2_value = models.CharField(max_length=100, verbose_name='stage_2_value', null=True, blank=True)
    run_current_high = models.CharField(max_length=100, verbose_name='RUN_CURRENT_HIGH', null=True, blank=True)
    run_current_low = models.CharField(max_length=100, verbose_name='RUN_CURRENT_LOW', null=True, blank=True)
    run_leakage_high = models.CharField(max_length=100, verbose_name='RUN_LEAKAGE_HIGH', null=True, blank=True)
    run_leakage_low = models.CharField(max_length=100, verbose_name='RUN_LEAKAGE_LOW', null=True, blank=True)
    comments = models.TextField(verbose_name="Comments", blank=True, null=True)
    add_time = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.test_id

    def get_fields(self):
        fields = [f.name for f in DvTable._meta.fields]
        return fields

    class Meta:
        verbose_name = "Dv Table"
        verbose_name_plural = verbose_name


class RhefTable(models.Model):
    choices = (
        ('PASS', 'PASS'),
        ('FAIL', 'FAIL')
    )
    test_type = models.CharField(verbose_name="Type", max_length=1000, default='Rhef Test', null=True, blank=True)
    test_id = models.CharField(max_length=1000, verbose_name="Test id", default='1')
    model = models.ForeignKey(TestModel, on_delete=models.CASCADE, verbose_name="Model")
    destination = models.ForeignKey(Destination, on_delete=models.CASCADE, verbose_name="Destination")
    gas_type = models.ForeignKey(GasType, on_delete=models.CASCADE, verbose_name="Gas Type")
    serial_no = models.CharField(max_length=100, verbose_name='SERIAL_NO', null=True, blank=True)
    gas_control_no = models.CharField(max_length=100, verbose_name='GAS_CONTROL_NO', null=True, blank=True)
    earth_continuity = models.CharField(max_length=100, verbose_name='EARTH_CONTINUITY', null=True, blank=True)
    insulation = models.CharField(max_length=100, verbose_name='INSULATION', null=True, blank=True)
    voltage = models.CharField(max_length=100, verbose_name='VOLTAGE', null=True, blank=True, default="230V±3")
    frequency = models.CharField(max_length=100, verbose_name='FREQUENCY', null=True, blank=True, default="50Hz")
    line_pressure = models.CharField(max_length=100, verbose_name='LINE_PRESSURE', null=True, blank=True)
    ignition = models.CharField(max_length=100, verbose_name='IGNITION', null=True, blank=True)
    pl_stage1 = models.CharField(max_length=100, verbose_name='PL_STAGE1', null=True, blank=True)
    pl_stage3 = models.CharField(max_length=100, verbose_name='PF_STAGE3', null=True, blank=True)
    pl_stage4 = models.CharField(max_length=100, verbose_name='PA_STAGE4', null=True, blank=True)
    pl_stage7 = models.CharField(max_length=100, verbose_name='PH_STAGE7', null=True, blank=True)
    pre_purge_period = models.CharField(max_length=100, verbose_name='PRE_PURGE_PERIOD', null=True, blank=True)
    cony_fan_on = models.CharField(max_length=100, verbose_name='CONY_FAN_ON', null=True, blank=True)
    ignition_time = models.CharField(max_length=100, verbose_name='IGNITION_TIME', null=True, blank=True)
    cut_off_response = models.CharField(max_length=100, verbose_name='CUT_OFF_RESPONSE', null=True, blank=True)
    stage_70 = models.CharField(max_length=100, verbose_name='STAGE_70', null=True, blank=True)
    stage_10 = models.CharField(max_length=100, verbose_name='STAGE_10', null=True, blank=True)
    relief_top_left = models.CharField(max_length=100, verbose_name='RELIEF_TOP_LEFT', null=True, blank=True)
    relief_top_right = models.CharField(max_length=100, verbose_name='RELIEF_TOP_RIGHT', null=True, blank=True)
    relief_bottom_left = models.CharField(max_length=100, verbose_name='RELIEF_BOTTOM_LEFT', null=True, blank=True)
    relief_bottom_right = models.CharField(max_length=100, verbose_name='RELIEF_BOTTOM_RIGHT', null=True, blank=True)
    air_leak_test = models.CharField(max_length=100, verbose_name='AIR_LEAK_TEST', null=True, blank=True)
    flame_picture = models.CharField(max_length=100, choices=choices, default="PASS")
    vibration = models.CharField(max_length=100, choices=choices, default="PASS")
    remote_control = models.CharField(max_length=100, choices=choices, default="PASS")
    combustion_stage_7 = models.CharField(max_length=100, verbose_name='Combustion fan RPM stage 7', null=True,
                                          blank=True)
    combustion_stage_3 = models.CharField(max_length=100, verbose_name='Combustion fan RPM stage 3', null=True,
                                          blank=True)
    combustion_stage_1 = models.CharField(max_length=100, verbose_name='Combustion fan RPM stage 1', null=True,
                                          blank=True)
    convection_stage_7 = models.CharField(max_length=100, verbose_name='Convection fan RPM stage 7', null=True,
                                          blank=True)
    electric_stage_7 = models.CharField(max_length=100, verbose_name='Electric Power WATTS stage 7', null=True,
                                        blank=True)
    electric_stage_1 = models.CharField(max_length=100, verbose_name='Electric Power WATTS stage 1', null=True,
                                        blank=True)
    electric_stage_low = models.CharField(max_length=100, verbose_name='Electric Power WATTS EXTRA LOW', null=True,
                                          blank=True)
    gas_flow_stage_7 = models.CharField(max_length=100, verbose_name='Gas Flow Litres/Minute stage 7', null=True,
                                        blank=True)
    gas_flow_stage_4 = models.CharField(max_length=100, verbose_name='Gas Flow Litres/Minute stage 4', null=True,
                                        blank=True)
    gas_flow_stage_3 = models.CharField(max_length=100, verbose_name='Gas Flow Litres/Minute stage 3', null=True,
                                        blank=True)
    gas_flow_stage_1 = models.CharField(max_length=100, verbose_name='Gas Flow Litres/Minute stage 1', null=True,
                                        blank=True)
    gas_flow_stage_low = models.CharField(max_length=100, verbose_name='Gas Flow Litres/Minute EXTRA LOW', null=True,
                                          blank=True)
    position_2_reading1 = models.CharField(max_length=100, verbose_name='Position 2 First Reading', null=True,
                                           blank=True)
    position_2_reading2 = models.CharField(max_length=100, verbose_name='Position 2 Second Reading', null=True,
                                           blank=True)
    position_4_reading1 = models.CharField(max_length=100, verbose_name='Position 4 First Reading', null=True,
                                           blank=True)
    position_4_reading2 = models.CharField(max_length=100, verbose_name='Position 4 Second Reading', null=True,
                                           blank=True)
    position_6_reading1 = models.CharField(max_length=100, verbose_name='Position 6 First Reading', null=True,
                                           blank=True)
    position_6_reading2 = models.CharField(max_length=100, verbose_name='Position 6 Second Reading', null=True,
                                           blank=True)
    comments = models.TextField(verbose_name="Comments", blank=True, null=True)
    add_time = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.test_id

    def get_fields(self):
        fields = [f.name for f in RhefTable._meta.fields]
        return fields

    class Meta:
        verbose_name = "Rhef Table"
        verbose_name_plural = verbose_name
