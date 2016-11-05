# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('maggie01', '0002_auto_20161105_1937'),
    ]

    operations = [
        migrations.AddField(
            model_name='userprofile',
            name='is_admin',
            field=models.BooleanField(default=False),
            preserve_default=True,
        ),
        migrations.AddField(
            model_name='visitor',
            name='created_at',
            field=models.DateTimeField(default=datetime.date(2016, 11, 5), auto_now_add=True),
            preserve_default=False,
        ),
        migrations.AddField(
            model_name='visitor',
            name='referal',
            field=models.ForeignKey(default='', to='maggie01.UserProfile'),
            preserve_default=False,
        ),
    ]
