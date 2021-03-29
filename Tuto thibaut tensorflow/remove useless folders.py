import os
from pathlib import Path
import shutil

base_dir = r'D:\Images\Projet champi\Champis'
limite = 100


for mush in os.listdir(base_dir):
    wd = os.path.join(base_dir, mush)
    taille = len(os.listdir(wd))
    if taille < 100:
        shutil.rmtree(os.path.join(base_dir, mush))
    print(mush + ' done')

