import csv
import urllib.request
import os
from urllib.error import HTTPError

def telecharger():
    t = 254921
    s = 0
    e = 0
    with open ('liens.csv', newline='') as csvfile:
        mondoc = csv.DictReader(csvfile)
        for ligne in mondoc:
            p = (s/t)*100
            y = str(p)[0:7]
            b = ligne['image'][40::]
            if not os.path.isfile(('dataset/brut/' + ligne['name']) + "/" + b):
                if not os.path.exists('dataset/brut/' + ligne['name']):
                    os.makedirs('dataset/brut/' + ligne['name'])
                print(str(s)+ "/" + str(t) + "  " + y + "% -- " + b + " -- error : " + str(e))
                try :
                    urllib.request.urlretrieve(ligne['image'], (('dataset/brut/' + ligne['name']) + "/" + b))
                    s = s+1;
                except HTTPError as err:
                    e = e+1
                    if err.code == 404:
                        print("error = " + str(e) + " -- 404error ----------------------------------------------------------")
                    else:
                        print("error = " + str(e) + " -- unknown error -----------------------------------------------------")
        print("error number = " + str(e))

def cut_two():
    #print(os.listdir("dataset/brut/"))
    for doss in os.listdir("dataset/brut/"):
        if not os.path.exists("dataset/brut/" + doss + "/" + "train"):
            os.makedirs("dataset/brut/" + doss + "/" + "train")
        if not os.path.exists("dataset/brut/" + doss + "/" + "test"):
            os.makedirs("dataset/brut/" + doss + "/" + "test")
        t = len("dataset/brut/" + doss))//0.7

