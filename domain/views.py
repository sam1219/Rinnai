from django.shortcuts import render
from django.views import View
from django.http import HttpResponseRedirect, JsonResponse
from django.urls import reverse
from .models import TestModel, GasType, TesterUser, Destination, DvTable, RhefTable
from .utils import judge_func


def get_now_time():
    from datetime import datetime
    now = datetime.now().strftime('%m-%d-%y %H:%M %p')
    return now


# class based view
class LoginView(View):
    """
    login View
    """

    def get(self, request):
        return render(request, 'login.html')

    def post(self, request):
        username = request.POST.get("username", None)
        password = request.POST.get("password", None)
        user = TesterUser.objects.filter(name=username, password=password)
        if user:
            request.session['username'] = username
            return HttpResponseRedirect(reverse("index"))
        else:
            return render(request, 'login.html', {'errors': ['Error in account or password']})


class RegisterView(View):
    def get(self, request):

        return render(request, 'register.html')

    def post(self, request):
        errors = []
        username = request.POST.get("username", None)
        password = request.POST.get("password", None)
        if username and password:
            if TesterUser.objects.filter(name=username):
                errors.append("This is already registered. Please login.")
            else:
                user = TesterUser.objects.create(name=username, password=password)
                user.save()
        if errors:
            return render(request, 'register.html', {'errors': errors})
        else:
            request.session['username'] = username
            return HttpResponseRedirect(reverse('index'))


class LogoutView(View):
    def get(self, request):
        del request.session['username']
        return HttpResponseRedirect(reverse("login"))


class IndexView(View):
    @staticmethod
    def check_user_login(request):
        if not request.session.get("username"):
            return False
        return True

    def get(self, request):
        if not self.check_user_login(request):
            return HttpResponseRedirect(reverse("login"))
        test_id = TesterUser.objects.get(name=request.session.get('username', "NULL")).password
        tests = list(DvTable.objects.filter(test_id=test_id)) + list(RhefTable.objects.filter(test_id=test_id))
        context = {
            "name": "Test Form",
            'tests': tests,
            'username': request.session.get('username', "NULL")
        }
        return render(request, 'index.html', context)


class DvTestForm(View):
    @staticmethod
    def check_user_login(request):
        if not request.session.get("username"):
            return False
        return True

    def get(self, request):
        if not self.check_user_login(request):
            return HttpResponseRedirect(reverse("login"))
        test_model = TestModel.objects.all()
        gas_type = GasType.objects.all()
        destination = Destination.objects.all()
        time = get_now_time()
        context = {
            "name": "DV Test Form",
            'model': test_model,
            'gas_type': gas_type,
            'destination': destination,
            'time': time,
            'username': request.session.get('username', "NULL"),
            'test_id': TesterUser.objects.get(name=request.session.get("username")).password
        }
        return render(request, 'table01.html', context)

    @staticmethod
    def get_fields():
        fields = DvTable().get_fields()
        fields.remove('id')
        return fields

    def save_data(self, data):
        fields = self.get_fields()
        data['model'] = TestModel.objects.get(name=data['model'][0])
        data['gas_type'] = GasType.objects.get(name=data['gas_type'][0])
        data['destination'] = Destination.objects.get(name=data['destination'][0])
        table = DvTable()
        for i in fields:
            if isinstance(data.get(i), list):
                setattr(table, i, data.get(i)[0])
            else:
                setattr(table, i, data.get(i))
        table.save()
        return table.id

    def post(self, request):
        data = dict(request.POST)
        table_id = self.save_data(data)
        return HttpResponseRedirect("../report?type=0&id=" + str(table_id))


class RHFETestForm(View):
    @staticmethod
    def check_user_login(request):
        if not request.session.get("username"):
            return False
        return True

    @staticmethod
    def get_fields():
        fields = RhefTable().get_fields()
        fields.remove('id')
        return fields

    def post(self, request):
        data = dict(request.POST)
        table_id = self.save_data(data)
        return HttpResponseRedirect("../report?type=1&id=" + str(table_id))

    def save_data(self, data):
        fields = self.get_fields()
        data['model'] = TestModel.objects.get(name=data['model'][0])
        data['gas_type'] = GasType.objects.get(name=data['gas_type'][0])
        data['destination'] = Destination.objects.get(name=data['destination'][0])
        table = RhefTable()
        for i in fields:
            if isinstance(data.get(i), list):
                setattr(table, i, data.get(i)[0])
            else:
                setattr(table, i, data.get(i))
        table.save()
        return table.id

    def get(self, request):
        if not self.check_user_login(request):
            return HttpResponseRedirect(reverse("login"))
        test_model = TestModel.objects.all()
        gas_type = GasType.objects.all()
        destination = Destination.objects.all()
        time = get_now_time()
        context = {
            "name": "RHFE Test Form",
            'model': test_model,
            'gas_type': gas_type,
            'time': time,
            'destination': destination,
            'username': request.session.get('username', "NULL"),
            'test_id': TesterUser.objects.get(name=request.session.get("username")).password
        }
        return render(request, 'table02.html', context)


class FormDeleteView(View):
    def get(self, request):
        table_id = request.GET.get("id")
        table_type = request.GET.get("type")
        if table_type == "Dv Test":
            DvTable.objects.get(pk=int(table_id)).delete()
        else:
            RhefTable.objects.get(pk=int(table_id)).delete()
        return HttpResponseRedirect(reverse('index'))


class ReportView(View):
    @staticmethod
    def check_user_login(request):
        if not request.session.get("username"):
            return False
        return True

    def get(self, request):
        table_type = request.GET.get("type", '0')
        if not self.check_user_login(request):
            return HttpResponseRedirect(reverse("login"))
        if table_type == '0':
            table_id = request.GET.get("id", None)
            if not table_id:
                return JsonResponse({'msg': "table id was wrong"})
            report = DvTable.objects.get(pk=int(table_id))
            func = judge_func(int(table_type))
            results = 'PASS'
            judge_list = {}
            for i in func.keys():
                args = getattr(report, i)
                if not args:
                    judge_list[i] = '<span style="color:red">FAILED</span>'
                else:
                    res = func[i](args)
                    if not res:
                        results = '<span style="color:red">FAILED</span>'
                    judge_list[i] = 'PASS' if res else '<span style="color:red">FAILED</span>'

            time = report.add_time.strftime('%m-%d-%y %H:%M %p')
            context = {
                "report": report,
                "name": "Report ",
                'test_id': TesterUser.objects.get(name=request.session.get("username")).password,
                'time': time,
                'judge_list': judge_list,
                'results': results
            }
            return render(request, 'report1.html', context)
        elif table_type == '1':
            table_id = request.GET.get("id", None)
            if not table_id:
                return JsonResponse({'msg': "table id was wrong"})
            report = RhefTable.objects.get(pk=int(table_id))
            func = judge_func(int(table_type))
            results = 'PASS'
            judge_list = {}
            for i in func.keys():
                args = getattr(report, i)
                if not args:
                    judge_list[i] = '<span style="color:red">FAILED</span>'
                else:
                    res = func[i](args)
                    if not res:
                        results = '<span style="color:red">FAILED</span>'
                    judge_list[i] = 'PASS' if res else '<span style="color:red">FAILED</span>'
            time = report.add_time.strftime('%m-%d-%y %H:%M %p')
            context = {
                "report": report,
                "name": "Report ",
                'test_id': TesterUser.objects.get(name=request.session.get("username")).password,
                'time': time,
                'judge_list': judge_list,
                'results': results
            }
            return render(request, 'report2.html', context)
