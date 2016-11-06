from django.shortcuts import render
from django.contrib.auth import authenticate, login
from django.http import HttpResponseRedirect, HttpResponse
from django.contrib.auth.decorators import login_required, permission_required
from django.contrib.auth import logout
from maggie01.models import *

def index(request):
	context_dict = {'boldmessage': "I am bold font from the context"}
	return render(request, 'maggie01/index.html', context_dict)

def user_login(request):

    # If the request is a HTTP POST, try to pull out the relevant information.
    if request.method == 'POST':
        # Gather the username and password provided by the user.
        # This information is obtained from the login form.
                # We use request.POST.get('<variable>') as opposed to request.POST['<variable>'],
                # because the request.POST.get('<variable>') returns None, if the value does not exist,
                # while the request.POST['<variable>'] will raise key error exception
        username = request.POST.get('username')
        password = request.POST.get('password')

        # Use Django's machinery to attempt to see if the username/password
        # combination is valid - a User object is returned if it is.
        user = authenticate(username=username, password=password)

        # If we have a User object, the details are correct.
        # If None (Python's way of representing the absence of a value), no user
        # with matching credentials was found.
        if user:
            # Is the account active? It could have been disabled.
            if user.is_active:
                # If the account is valid and active, we can log the user in.
                # We'll send the user back to the homepage.
                login(request, user)
                return HttpResponseRedirect('/maggie01/welcome_view/')
            else:
                # An inactive account was used - no logging in!
                return HttpResponse("Your account is disabled.")
        else:
            # Bad login details were provided. So we can't log the user in.
            print "Invalid login details: {0}, {1}".format(username, password)
            return HttpResponse("Invalid login details supplied.")

    # The request is not a HTTP POST, so display the login form.
    # This scenario would most likely be a HTTP GET.
    else:
        # No context variables to pass to the template system, hence the
        # blank dictionary object...
        return render(request, 'maggie01/login.html', {})


@login_required
def create_activity(request):
	if request.method == 'POST':
		a = Activity(name = request.POST.get('name'))
		a.save()
		return HttpResponseRedirect('/maggie01/welcome_view/')
	return render(request, 'maggie01/createActivity.html', {})


@login_required
def add_visitor(request):
	if request.method == 'POST':
		v = Visitor(visit_type = request.POST.get('visit_type'),
				gender = request.POST.get('gender'),
				person_type = request.POST.get('person_type'),
				cancer_site = request.POST.get('cancer_site'),
				journey_stage = request.POST.get('journey_stage'),
				nature_of_visit = request.POST.get('nature_of_visit'),
				referal = UserProfile.objects.get(user=request.user)
				)
		v.save()
		return HttpResponseRedirect('/maggie01/welcome_view/')
	return render(request, 'maggie01/add_visitor.html', {})


@login_required
def dashboard(request):
	return render(request, 'maggie01/pages/index.php', {}) 

@login_required
def manage_visitors(request):
	visitors = Visitor.objects.all()
	return render(request, 'maggie01/manageUsers.html', {"visitors": visitors})

@login_required
def welcome_view(request):
	if request.user.is_authenticated():
		username = UserProfile.objects.get(user=request.user)
		username = username.is_admin
		if username:
			return render(request, 'maggie01/welcomeAdmin.html', {})
		else:
			return render(request, 'maggie01/welcomeEmployee.html', {})
	
	return render(request, 'maggie01/login.html', {})


@login_required
def logout_view(request):
    logout(request)
    
    return HttpResponseRedirect('/maggie01/')