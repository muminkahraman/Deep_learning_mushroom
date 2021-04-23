import os
import shutil
import sys

import matplotlib.pyplot as plt
import numpy as np
import pandas as pd
import tensorflow as tf
from PIL import Image
from tensorflow.keras.preprocessing.image import ImageDataGenerator

# A modifier en fonction de où sont rangées les photos


base_dir = r'D:\Images\Projet champi\Total'
target = r'D:\Images\Projet champi\Champis_resized'
labels = os.listdir(target)

IMG_SIZE = (224,224)
IMG_SHAPE = IMG_SIZE + (3,)

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
    train_dataset = tf.keras.preprocessing.image_dataset_from_directory(
            target, labels='inferred', color_mode=clrmd, image_size=IMG_SIZE,
            validation_split=val_split, subset='training', seed=3
    )

    validation_dataset = tf.keras.preprocessing.image_dataset_from_directory(
        target, labels='inferred', color_mode=clrmd, image_size=IMG_SIZE,
        validation_split=val_split, subset='validation', seed=3
    )

    val_batches = tf.data.experimental.cardinality(validation_dataset)
    test_dataset = validation_dataset.take(val_batches)
    validation_dataset = validation_dataset.skip(val_batches)

    print("finished creating dataset")

    #Cette partie est censée optimiser l'accès aux données,
    # mais elle empêche leur affichage...

    '''
    AUTOTUNE = tf.data.AUTOTUNE

    train_dataset = train_dataset.prefetch(buffer_size=AUTOTUNE)
    validation_dataset = validation_dataset.prefetch(buffer_size=AUTOTUNE)
    test_dataset = test_dataset.prefetch(buffer_size=AUTOTUNE)
    '''

    return train_dataset, test_dataset, validation_dataset

# Pour vérifier que la création du dataset s'est bien passée
# count limité à 32 à cause da la taille des batchs...


def show_sample(ds,count):
    class_names = ds.class_names

    plt.figure(figsize=(10, 10))
    for images, labels in ds.take(1):
        for i in range(count):
            ax = plt.subplot(3, 3, i + 1)
            plt.imshow(images[i].numpy().astype("uint8"))
            plt.title(class_names[labels[i]])
            plt.axis("off")
    plt.show()

def show_shuffled_sample(ds):

    data_augmentation = tf.keras.Sequential([
        tf.keras.layers.experimental.preprocessing.RandomFlip('horizontal'),
        tf.keras.layers.experimental.preprocessing.RandomRotation(0.2)]
    )

    for image, _ in ds.take(1):
      plt.figure(figsize=(10, 10))
      first_image = image[0]
      for i in range(9):
        ax = plt.subplot(3, 3, i + 1)
        augmented_image = data_augmentation(tf.expand_dims(first_image, 0))
        plt.imshow(augmented_image[0] / 255)
        plt.axis('off')

    plt.show()


def create_model(ds):
    print("Start creating model")
    preprocess_input = tf.keras.applications.mobilenet_v2.preprocess_input

    data_augmentation = tf.keras.Sequential([
        tf.keras.layers.experimental.preprocessing.RandomFlip('horizontal'),
        tf.keras.layers.experimental.preprocessing.RandomRotation(0.2)]
    )

    #Ici on importe MobileNetV2 et on le gèle
    base_model = tf.keras.applications.MobileNetV2(input_shape=IMG_SHAPE,
                                                   include_top=False,
                                                   weights='imagenet')

    base_model.trainable = False

    global_average_layer = tf.keras.layers.GlobalAveragePooling2D()

    prediction_layer = tf.keras.layers.Dense(443, activation=tf.keras.activations.sigmoid)

    inputs = tf.keras.Input(shape=(IMG_SIZE[0], IMG_SIZE[1], 3))

    x = data_augmentation(inputs)
    x = preprocess_input(x)
    x = base_model(x, training=False)
    x = global_average_layer(x)
    x = tf.keras.layers.Dropout(0.2)(x)
    output = prediction_layer(x)

    model = tf.keras.Model(inputs, output)

    print("Finished creating model")
    print("Compiling model")

    base_learning_rate = 0.0001
    model.compile(optimizer=tf.keras.optimizers.Adam(lr=base_learning_rate),
                  loss=tf.keras.losses.BinaryCrossentropy(from_logits=True),
                  metrics=['accuracy'])

    print(model.summary())
    return model



train_dataset, test_dataset, validation_dataset = create_dataset(.8, 'rgb')

model = create_model(train_dataset)

initial_epochs = 10

