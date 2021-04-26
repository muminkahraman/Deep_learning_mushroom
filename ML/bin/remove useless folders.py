import os
from pathlib import Path
import shutil

base_dir = r'D:\Documents\Cours\L3 INFO\LIFPROJET\dataset\brut'
limite = 100

if not os.path.exists(os.path.join(base_dir, "unusable/")):
    os.makedirs(os.path.join(base_dir, "unusable/"))
for mush in os.listdir(base_dir):
    taille = len(os.listdir(os.path.join(base_dir, mush)))
    if taille <= limite:

        shutil.move(os.path.join(base_dir, mush), os.path.join(base_dir, "unusable/"))
    print(mush + ' done')


