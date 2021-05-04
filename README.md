# SITE WEB : MUSHING LEARNING
***
# PROJET AM1

## Objectifs
Le tout premier objectif a été de développer un IA permettant de différencier des champignons. Ensuite nous avons integré le modèle sur un site web.

## Installation 
Le site web est hebergé en ligne sur http://mumin.fr/. Sinon pour faire tourner le site en local il faut un serveur WAMP/XAMPP sous windows ou bien apache2 sous Linux.
Les fichiers contiennent du PHP donc il est nécessaire d'installer les modules requis sur windows et linux. Ensuite lancer index.php.
Ensuite cliquez sur le champignon central et insérez une image de champignon. Cliquez sur le bouton predict et les résultats s'afficheront.

## Organisation et explications du code

### Partie ML : Tout le code lié au développement du modèle et à la mise en forme des données est situé dans /ML

#### Dans /ML/bin vous trouverez les scripts. 
"Folder to dataset" est notre script principal, il contient notamment : 
    - la fonction "resize" qui nous a permi de redimensionner les images, mais surtout 
    d'ignorer les images corrompues lors du transfert de données.
    - La fonction "create_dataset" qui créé les 3 dataset train, validation, test
    - La fonction "create_model" qui créé la version finale de notre modèle
    - Quelques fonctions d'affichages commençant par "show"
Ce script a été modifier de nombreuses fois pour créer des modèles avec des paramètres différents, les enregistrer,
tracer les courbes de performances directement sur TensorBoard, enregistrer ces courbes dans /ML/logs,
tester l'import du modèle entrainer etc...

"remove train test" nous a servi à enlever une arborescence de fichier qui ne convenait pas à la fonction d'import 
de données de Tensorflow.

"remove useless folders" nous a permis de retirer les dossiers avec moins de 100 photos.

#### Dans /ML/logs vous trouverez les logs TensorFlow pour les différentes sessions d'entrainement. 
Ces logs peuvent être visualisés facilement en allant dans le terminal et en tapant la commande : 
    tensorboard --logdir /ML/logs/fit 

#### Dans /ML/saved_models vous trouverez les fichiers contenant les différents modèles que nous avons conçu et entrainé.
Le plus performant étant le modèle 6, nous n'avons pas sauvegardé les suivants car il n'y avait pas de différence significative.



### Partie web : Tout le code lié au développement du modèle et à la mise en forme des données est situé dans /web

#### Dans /web se trouvent tous les fichiers .php

#### Dans /web/bootstrap se trouvent les différents fichiers du framework Bootsrap

#### Dans web/js se trouvent les différents fichiers js nécéssaire pour implémenter le script 

#### Dans web/ressources se trouvent les différentes ressources comme les images utilisées ou bien les classes de champignons



## Résultats : 
Le résultat se trouve sur le site http://mumin.fr/
