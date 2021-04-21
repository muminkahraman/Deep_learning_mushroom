import csv
import urllib.request
import os
from urllib.error import HTTPError
import shutil
import matplotlib.pyplot as plt
import numpy as np
import tensorflow as tf

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
    dele()
    for doss in os.listdir("dataset/brut/"):
        liste = os.listdir("dataset/brut/" + doss + "/")
        le = int((len(liste)))
        t = int((len(liste))*0.7)
        s = (len(liste))- t
        print("dataset/brut/" + doss + "/" )
        if not os.path.exists("dataset/brut/" + doss + "/" + "train"):
            os.makedirs("dataset/brut/" + doss + "/" + "train")
        if not os.path.exists("dataset/brut/" + doss + "/" + "test"):
            os.makedirs("dataset/brut/" + doss + "/" + "test")
        for i in range(t):
            print("t = " + str(t) + "    s = " +str(s) +"    i = " + str(i)+ "    len = " + str(le))
            shutil.move(("dataset/brut/" + doss + "/" + liste[i]), ("dataset/brut/" + doss + "/" + "train" + "/" + liste[i]))
            print("train" + "/" + liste[i] + "  ------  done")
        for i in range(t, le):
            print("t = " + str(t) + "    s = " +str(s) +"    i = " + str(i)+ "    len = " + str(le))
            shutil.move(("dataset/brut/" + doss + "/" + liste[i]), ("dataset/brut/" + doss + "/" + "test" + "/" + liste[i]))
            print("test" + "/" + liste[i] + "  ------  done")

def dele():
    for doss in os.listdir("dataset/brut/"):
        if os.path.exists("dataset/brut/" + doss + "/" + "train"):
            os.rmdir("dataset/brut/" + doss + "/" + "train")
        if os.path.exists("dataset/brut/" + doss + "/" + "test"):
            os.rmdir("dataset/brut/" + doss + "/" + "test")

def number_filter():
    if not os.path.exists("dataset_filtered1"):
        os.makedirs("dataset_filtered1");
    s = 0
    n = 0
    for doss in os.listdir("dataset/brut/"):
        liste_tr = os.listdir('dataset/brut/' + doss + '/train/')
        liste_te = os.listdir('dataset/brut/' + doss + '/test/')
        tr = len(liste_tr)
        te = len(liste_te)       
        c = te + tr
        #c = len([name for name in os.listdir('dataset/brut/' + doss + '/train') if os.path.isfile(name) ])
        #c = c + len([name for name in os.listdir('dataset/brut/' + doss + '/test') if os.path.isfile(name)])
        #print(c)
        if c >= 100:
            if not os.path.exists("dataset_filtered1/train/" + doss + "/"):
                os.makedirs("dataset_filtered1/train/" + doss + "/");
            if not os.path.exists("dataset_filtered1/test/" + doss + "/"):
                os.makedirs("dataset_filtered1/test/" + doss + "/");
            for im in liste_tr:
                shutil.move(("dataset/brut/" + doss + "/train/" + im), ("dataset_filtered1/train/" + doss + "/" + im))
                print("moving   dataset/brut/" + doss + "/train/" + im + "   =>   dataset_filtered1/train/" + doss + "/" + im)
            for im in liste_te:
                shutil.move(("dataset/brut/" + doss + "/test/" + im), ("dataset_filtered1/test/" + doss + "/" + im))
                print("moving   dataset/brut/" + doss + "/test/" + im + "   =>   dataset_filtered1/test/" + doss + "/" + im)
            s +=1
            n = n + c
    print (str(s) + ' ------------ ' + str(n))

def test():
    l=[]
    for i in range(0,20):
        l.append(i)
    print(l)
    print(len(l))

def json_nom():
    with open ('liens.csv', newline='') as csvfile:
        f = open("champName.json", "w")
        mondoc = csv.DictReader(csvfile)
        noms = []
        lines = []
        for ligne in mondoc:
            noms.append(ligne['name'])
        for nom in noms:
            if ('{\n\t"Name":"' + nom + '"\n}\n') not in lines:
                lines.append('{\n\t"Name":"' + nom + '"\n}\n')
        f.writelines(lines)
        f.close()
            
