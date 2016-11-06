# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
        ('maggie01', '0005_auto_20161105_2230'),
    ]

    operations = [
        migrations.AlterField(
            model_name='visitor',
            name='referal',
            field=models.ForeignKey(blank=True, to='maggie01.UserProfile', null=True),
        ),
    ]
