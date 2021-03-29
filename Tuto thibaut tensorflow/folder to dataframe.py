import os, sys
import shutil
import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
from PIL import Image

base_dir = r'D:\Images\Projet champi\Champis'
target = r'D:\Images\Projet champi\Champis_resized'
try:
    os.mkdir(target)
except (FileExistsError):
    pass

labels = os.listdir(base_dir)
images = []
names = []
size = (480, 480)
count = 0

for mush_name in labels:
    count+=1
    wd = os.path.join(base_dir, mush_name)
    target_dir = os.path.join(target, mush_name)

    try:
        os.mkdir(target_dir)
        for pic in os.listdir(wd):
            img_path = os.path.join(wd, pic)
            outfile = os.path.join(target_dir, pic)
            try:
                img = Image.open(img_path)
                new = img.resize(size, 1)
                new.save(outfile)
            except Exception:
                pass

    except FileExistsError:
        pass

    print(str(count/len(labels) * 100 ) + " effectués !")


'''
for mush_name in labels[0]:
    print(mush_name)
    wd = os.path.join(base_dir, mush_name)

    for pic in os.listdir(wd):
        img_path = os.path.join(wd, pic)
        img = Image.open(img_path)
        print(img.size)
        img = img.thumbnail(size, Image.ANTIALIAS)

        names.append(mush_name)


mushrooms = {'image': images,
             'names': names}

df = pd.DataFrame(mushrooms, columns=['image', 'names'])
print(df)
'''



