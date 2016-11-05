# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.conf import settings


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
        ('maggie01', '0001_initial'),
    ]

    operations = [
        migrations.CreateModel(
            name='UserProfile',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('role', models.CharField(max_length=256)),
                ('gender', models.CharField(max_length=256)),
                ('user', models.OneToOneField(to=settings.AUTH_USER_MODEL)),
            ],
            options={
            },
            bases=(models.Model,),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='cancer_site',
            field=models.CharField(max_length=256, blank=True),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='gender',
            field=models.CharField(max_length=256, blank=True),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='journey_stage',
            field=models.CharField(max_length=256, blank=True),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='nature_of_visit',
            field=models.CharField(max_length=256, blank=True),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='person_type',
            field=models.CharField(max_length=256, blank=True),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='visit_type',
            field=models.CharField(max_length=256, blank=True),
        ),
    ]
