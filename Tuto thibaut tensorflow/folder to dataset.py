import os, sys
import shutil
import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
from PIL import Image
import tensorflow as tf
from tensorflow.keras.preprocessing.image import ImageDataGenerator

# A modifier en fonction de où sont rangées les photos


base_dir = r'D:\Images\Projet champi\Total'
target = r'D:\Images\Projet champi\Champis_resized'
labels = os.listdir(target)


# Un peu inutile car cette fonctionnalité est incluse
# dans la fonction image_dataset_from_directory...

def resize(source_path, target_path):
    count = 0
    size = (480, 480)
    labels = os.listdir(source_path)

    try:
        os.mkdir(target_path)
    except (FileExistsError):
        pass

    for mush_name in labels:
        count+=1
        wd = os.path.join(source_path, mush_name)
        target_dir = os.path.join(target_path, mush_name)

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

# clrmd = 'rgb' ou 'grayscale' ou 'rgba', valsplit donne la fraction de donnée qui part
# dans le training ou le testing, en fonction de l'argument "subset"


def create_dataset(val_split, clrmd):
    print("started creating dataset")
    train = tf.keras.preprocessing.image_dataset_from_directory(
            target, labels='inferred', color_mode=clrmd, image_size=(480, 480),
            validation_split=val_split, subset='training', seed=3
    )

    validation = tf.keras.preprocessing.image_dataset_from_directory(
        target, labels='inferred', color_mode=clrmd, image_size=(480, 480),
        validation_split=val_split, subset='validation', seed=3
    )
    print("finished creating dataset")

    return train, validation

# Pour vérifier que la création du dataset s'est bien passée
# count limité à 32 à cause da la taille des batchs...


def show_sample(ds,count):
    class_names = ds.class_names

    plt.figure(figsize=(10, 10))
    for images, labels in train_dataset.take(1):
        for i in range(count):
            ax = plt.subplot(3, 3, i + 1)
            plt.imshow(images[i].numpy().astype("uint8"))
            plt.title(class_names[labels[i]])
            plt.axis("off")
    plt.show()

train_dataset, validation_dataset = create_dataset(.8, 'rgb')


val_batches = tf.data.experimental.cardinality(validation_dataset)
test_dataset = validation_dataset.take(val_batches)
validation_dataset = validation_dataset.skip(val_batches)

AUTOTUNE = tf.data.AUTOTUNE

train_dataset = train_dataset.prefetch(buffer_size=AUTOTUNE)
validation_dataset = validation_dataset.prefetch(buffer_size=AUTOTUNE)
test_dataset = validation_dataset.prefetch(buffer_size=AUTOTUNE)

data_augmentation = tf.keras.Sequential([
    tf.keras.layers.experimental.preprocessing.RandomFlip('horizontal'),
    tf.keras.layers.experimental.preprocessing.RandomRotation(0.2)]
)


def show_shuffled_sample(ds):

    for image, _ in ds.take(1):
      plt.figure(figsize=(10, 10))
      first_image = image[0]
      for i in range(9):
        ax = plt.subplot(3, 3, i + 1)
        augmented_image = data_augmentation(tf.expand_dims(first_image, 0))
        plt.imshow(augmented_image[0] / 255)
        plt.axis('off')

    plt.show()


