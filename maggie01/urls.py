from django.conf.urls import patterns, url
from maggie01 import views

urlpatterns = patterns('',
        url(r'^$', views.index, name='index'))