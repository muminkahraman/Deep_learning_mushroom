import os
from pathlib import Path
import shutil

base_dir = r'../dataset/brut/'
limite = 100

if not os.path.exists("../dataset/unusable/"):
    os.makedirs("../dataset/unusable")
for mush in os.listdir(base_dir):
    taille = len(os.listdir("../dataset/brut/" + mush + "/"))
    if taille < limite:

        shutil.move((r"../dataset/brut/" + mush + "/"), (r"../dataset/unusable/" + mush + "/"))
    print(mush + ' done')


