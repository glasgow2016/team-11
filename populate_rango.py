import os
import csv
os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'maggie_prototype.settings')

import django
django.setup()

from maggie01.models import *


def populate():
    with open('cfg16.csv', 'rb') as f:
        reader = csv.reader(f)
        for row in reader:
            print row
            add_visitor(row[0],row[1],row[2],row[3],row[4],row[5],row[6],row[7],row[8],row[9],row[10])

def add_page(cat, title, url, views=0):
    p = Page.objects.get_or_create(category=cat, title=title)[0]
    p.url=url
    p.views=views
    p.save()
    return p

def add_visitor(date,seen_by,person,visit_type,gender,cancer_site,journey_stage,nature_of_visit,act1,act2,act3):
    v = Visitor.objects.create()
    v.visit_type = visit_type
    v.gender = gender
    v.person_type = person
    v.cancer_site = cancer_site
    v.journey_stage = journey_stage
    v.nature_of_visit = nature_of_visit
    v.save()
    return v


# Start execution here!
if __name__ == '__main__':
    print "Starting Rango population script..."
    populate()