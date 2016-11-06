# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
        ('maggie01', '0003_auto_20161105_2129'),
    ]

    operations = [
        migrations.AlterField(
            model_name='visitor',
            name='cancer_site',
            field=models.CharField(default=b'', max_length=256, blank=True),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='gender',
            field=models.CharField(default=b'', max_length=256, blank=True),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='journey_stage',
            field=models.CharField(default=b'', max_length=256, blank=True),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='nature_of_visit',
            field=models.CharField(default=b'', max_length=256, blank=True),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='person_type',
            field=models.CharField(default=b'', max_length=256, blank=True),
        ),
        migrations.AlterField(
            model_name='visitor',
            name='visit_type',
            field=models.CharField(default=b'', max_length=256, blank=True),
        ),
    ]
