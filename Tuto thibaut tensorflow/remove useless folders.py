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
        """
        if not os.path.exists("../dataset/unusable/" + mush):
            os.makedirs("../dataset/unusable/" + mush)
        shutil.rmtree(os.path.join(base_dir, mush))
        """
    print(mush + ' done')


