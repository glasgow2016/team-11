# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Activity',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('name', models.CharField(max_length=256, blank=True)),
            ],
            options={
            },
            bases=(models.Model,),
        ),
        migrations.CreateModel(
            name='Visitor',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('visit_type', models.CharField(max_length=256)),
                ('gender', models.CharField(max_length=256)),
                ('person_type', models.CharField(max_length=256)),
                ('cancer_site', models.CharField(max_length=256)),
                ('journey_stage', models.CharField(max_length=256)),
                ('nature_of_visit', models.CharField(max_length=256)),
                ('activity', models.ManyToManyField(to='maggie01.Activity')),
            ],
            options={
            },
            bases=(models.Model,),
        ),
    ]
