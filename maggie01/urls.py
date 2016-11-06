from django.conf.urls import patterns, url
from maggie01 import views

urlpatterns = patterns('',
        url(r'^$', views.index, name='index'),
		url(r'^login/$', views.user_login, name='login'),
		url(r'^logout/$', views.logout_view, name='logout'),
		url(r'^welcome_view/$', views.welcome_view, name='welcome_view'),
		url(r'^add_visitor/$', views.add_visitor, name='add_visitor'),
		url(r'^manage_visitors/$', views.manage_visitors, name='manage_visitors'),
		)