# Projet SAE 2.03 Equipe 02
_(Changez la X par votre numéro d'équipe)_

##  SAE 2.03    Installation de services réseaux   
_(Le titre doit être court et descriptif)_

1.  docker build -t httpd .

Crée une image Docker nommée httpd à partir du fichier Dockerfile situé dans le répertoire actuel.

2. docker run -d -p 8727:80 --name test httpd

Lance un conteneur nommé test à partir de l’image httpd, en mode détaché (-d), et redirige le port 8727 de l’hôte vers le port 80 du conteneur (utilisé par un serveur web).

3. docker ps 

Lister les conteneurs Docker en cours d’exécution sur le système.
Image / Command / Created / Status / Ports / Names

4. docker stop test

Arrête le conteneur nommé test s’il est en cours d’exécution.

5. docker rm test

Supprime le conteneur test du système (doit être arrêté avant).

## Membres de l'équipe
_(**Format :** Demi-groupe - NOM Prénom)_

A2 - Erwan    MARTIN     
A1 - Quoc Tri NGUYEN     
A2 - Floriane LEPILLER  
A1 - Maxence  LEHEURTEUR 

## Liens vers le site web du projet
https://mioko3.github.io/docker-sae203/

## Liens vers le dépôt github du projet
https://github.com/mioko3/docker-sae203.git


