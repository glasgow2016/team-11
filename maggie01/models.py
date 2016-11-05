from django.db import models
from django.contrib.auth.models import *


# Create your models here.

class Activity(models.Model):
	name = models.CharField(max_length=256, unique=False, blank=True)
	
	def __unicode__(self):
		return self.name

class UserProfile(models.Model):
	user = models.OneToOneField(User)

	role = models.CharField(max_length=256, unique=False, blank=False)
	gender = models.CharField(max_length=256, unique=False, blank=False)
	is_admin = models.BooleanField(default=False)

	def __unicode__(self):
		return self.user.username

class Visitor(models.Model):
	created_at = models.DateTimeField(auto_now_add=True)
	visit_type = models.CharField(max_length=256, unique=False, blank=True)
	gender = models.CharField(max_length=256, unique=False, blank=True)
	person_type = models.CharField(max_length=256, unique=False, blank=True)	
	cancer_site = models.CharField(max_length=256, unique=False, blank=True)
	journey_stage = models.CharField(max_length=256, unique=False, blank=True)
	nature_of_visit = models.CharField(max_length=256, unique=False, blank=True)
	activity = models.ManyToManyField(Activity);
	referal = models.ForeignKey(UserProfile, on_delete=models.CASCADE)

	def __unicode__(self):
		return self.person_type

