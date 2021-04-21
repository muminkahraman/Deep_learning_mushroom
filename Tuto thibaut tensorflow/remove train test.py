import os
from pathlib import Path
import shutil

#  RAJOUTER DES JOIN

base_dir = '../dataset/brut/'
for mush in os.listdir(base_dir):

    source1 = '/train'
    source1 = os.path.join(base_dir, mush) + source1
    source2 = '/test'
    source2 = os.path.join(base_dir, mush) + source2
    target = os.path.join(base_dir, mush)
    for file in os.listdir(source1):
        shutil.move(os.path.join(source1, file), target)

    for file in os.listdir(source2):
        shutil.move(os.path.join(source2, file), target)

    shutil.rmtree(source1)
    shutil.rmtree(source2)
    print(mush + ' done')