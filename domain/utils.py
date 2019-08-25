table01 = [
    'SERIAL NO',
    'GAS CONTROL NO',
    'EARTH CONTINUITY',
    'INSULATION',
    'LINE PRESSURE',
    'SET PRESSURE HIGH',
    'SET PRESSURE LOW',
    'STAGE 1',
    'STAGE 2',
    'RUN CURRENT HIGH',
    'RUN CURRENT LOW',
    'RUN LEAKAGE HIGH',
    'RUN LEAKAGE LOW',
]
table02 = [
    'SERIAL NO',
    'GAS CONTROL NO',
    'VOLTAGE',
    'FREQUENCY',
    'LINE PRESSURE',
    'IGNITION',
    'PL STAGE1',
    'PL STAGE3',
    'PL STAGE4',
    'PL STAGE7',
    'PRE_PURGE PERIOD',
    'CONY FAN ON',
    'IGNITION TIME',
    'CUT OFF RESPONSE',
    'STAGE 70',
    'STAGE 10',
    'RELIEF TOP LEFT',
    'RELIEF TOP RIGHT',
    'RELIEF BOTTOM LEFT',
    'RELIEF BOTTOM RIGHT',
    'AIR LEAK TEST'

]


def earth_continuity(x):
    return float(x) < 0.1


def insulation(x):
    return float(x) > 1.0


def line_pressure(x):
    return float(x) == 2.75


def set_pressure_high(x):
    return float(x) == 1.7


def set_pressure_low(x):
    return float(x) == 0.5


def stage_1_value(x):
    return float(x) > 3.0


def stage_2_value(x):
    return float(x) > 3.0


def run_current_high(x):
    return 0.19 < float(x) < 0.21


def run_current_low(x):
    return 0.14 < float(x) < 0.16


def run_leakage_high(x):
    return float(x) < 3.5


def run_leakage_low(x):
    return float(x) < 3.5


def ignition(x):
    return float(x) == 0.98


def pl_stage1(x):
    return float(x) == 0.18


def pl_stage3(x):
    return float(x) == 0.67


def pl_stage4(x):
    return float(x) == 0.30


def pl_stage7(x):
    return float(x) == 0.78


def pre_purge_period(x):
    return 10 < float(x) < 18


def cony_fan_on(x):
    return 10 < float(x) < 16


def ignition_time(x):
    return 6 < float(x) < 17


def cut_off_response(x):
    return float(x) < 2


def combustion_stage_7(x):
    return 1810 < float(x) < 2010


def combustion_stage_3(x):
    return 1510 < float(x) < 1710


def combustion_stage_1(x):
    return 980 < float(x) < 1180


def electric_stage_7(x):
    return 75 < float(x) < 90


def electric_stage_1(x):
    return 53 < float(x) < 63


def electric_stage_low(x):
    return 42 < float(x) < 52


def gas_flow_stage_7(x):
    return 16.0 < float(x) < 19.0


def gas_flow_stage_4(x):
    return 12.0 < float(x) < 14.0


def gas_flow_stage_3(x):
    return 9.0 < float(x) < 12.0


def gas_flow_stage_1(x):
    return 4.0 < float(x) < 6.0


def gas_flow_stage_low(x):
    return 0.2 < float(x) < 1.5


def position_2_reading1(x):
    return float(x) < 0.8


def position_2_reading2(x):
    return float(x) < 0.8


def position_4_reading1(x):
    return float(x) < 0.8


def position_4_reading2(x):
    return float(x) < 0.8


def position_6_reading1(x):
    return float(x) < 0.8


def position_6_reading2(x):
    return float(x) < 0.8


def relief_top_left(x):
    return 40 < float(x) < 80


def relief_top_right(x):
    return 40 < float(x) < 80


def relief_bottom_left(x):
    return 40 < float(x) < 80


def relief_bottom_right(x):
    return 40 < float(x) < 80


def air_leak_test(x):
    return float(x) < 125


def judge_func(table=1):
    if table == 0:
        func_dict = {
            'earth_continuity': earth_continuity,
            'insulation': insulation,
            'line_pressure': line_pressure,
            'set_pressure_high': set_pressure_high,
            'set_pressure_low': set_pressure_low,
            'stage_1_value': stage_1_value,
            'stage_2_value': stage_2_value,
            'run_current_high': run_current_high,
            'run_current_low': run_current_low,
            'run_leakage_high': run_leakage_high,
            'run_leakage_low': run_leakage_low
        }
    else:
        func_dict = {
            'earth_continuity': earth_continuity,
            'insulation': insulation,
            'ignition': ignition,
            'pl_stage1': pl_stage1,
            'pl_stage3': pl_stage3,
            'pl_stage4': pl_stage4,
            'pl_stage7': pl_stage7,
            'pre_purge_period': pre_purge_period,
            'cony_fan_on': cony_fan_on,
            'ignition_time': ignition_time,
            'cut_off_response': cut_off_response,
            'combustion_stage_7': combustion_stage_7,
            'combustion_stage_3': combustion_stage_3,
            'combustion_stage_1': combustion_stage_1,
            'electric_stage_7': electric_stage_7,
            'electric_stage_1': electric_stage_1,
            'electric_stage_low': electric_stage_low,
            'gas_flow_stage_7': gas_flow_stage_7,
            'gas_flow_stage_4': gas_flow_stage_4,
            'gas_flow_stage_3': gas_flow_stage_3,
            'gas_flow_stage_1': gas_flow_stage_1,
            'gas_flow_stage_low': gas_flow_stage_low,
            'position_2_reading1': position_2_reading1,
            'position_2_reading2': position_2_reading2,
            'position_4_reading1': position_4_reading1,
            'position_4_reading2': position_4_reading2,
            'position_6_reading1': position_6_reading1,
            'position_6_reading2': position_6_reading2,
            'relief_top_left': relief_top_left,
            'relief_top_right': relief_top_right,
            'relief_bottom_left': relief_bottom_left,
            'relief_bottom_right': relief_bottom_right,
            'air_leak_test': air_leak_test

        }
    return func_dict


if __name__ == '__main__':
    pass
    #
    # for i in table02:
    #     i = i.replace(" ", "_")
    #     print(f"{i.lower()}=models.CharField(max_length=100,verbose_name='{i}',null=True,blank=True)")
