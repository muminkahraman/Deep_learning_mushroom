import os
from pathlib import Path
import shutil

#  RAJOUTER DES JOIN
base_dir = r'D:\Documents\Cours\L3 INFO\LIFPROJET\dataset\brut'

for mush in os.listdir(base_dir):

    train = "train/"
    test = "test/"
    source = os.path.join(base_dir, mush)
    source1 = os.path.join(source, train)
    source2 = os.path.join(source, test)

    target = os.path.join(base_dir, mush)
    for file in os.listdir(source1):
        shutil.move(os.path.join(source1, file), target)

    for file in os.listdir(source2):
        shutil.move(os.path.join(source2, file), target)

    shutil.rmtree(source1)
    shutil.rmtree(source2)
    print(mush + ' done')