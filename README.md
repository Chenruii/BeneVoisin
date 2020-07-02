# BeneVoisin
 To fish peach or not to peach fish  
 
> issue :
 Lorsqu’on a besoin de faire quelque chose (travaux, cuisine, etc.), on rencontre souvent plusieurs problématiques :
  - Manque de ressources précises et besoin de connaissances du sujet
  - Manque de technique ou de savoir-faire
  - Manque d’interaction et donc de ressource humaine lors de ces di-travaux
> Idea : 
  Echanges de savoir-faire interculturels

> Who it concerns:  : 
  - Ceux qui veulent apprendre à faire des choses qu’ils ne connaissent pas et/ou veulent juste découvrir
  - les personnes ou groupes qui veulent partager leur passion ou leur savoir-faire, qui veulent transmettre

> What she does : 
  - Permet de répondre à des besoins ponctuels (travaux manuels, cuisine, autres)
  - Permet d’échanger sur des sujets et de trouver des ressources de façon aisée
  - Permet de communiquer entre personnes qui ne parlent pas la même langue avec une interface de traduction

> What it changes: :
  - Ouverture d’esprit des personnes
  - Développer sa sociabilité
  - Agrandir sa communauté de vie
  - Parfaire ses savoirs-faire
  

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)  
[![Build Status](https://travis-ci.org/Sidfate/helpers.svg?branch=master)](https://travis-ci.org/Sidfate/helpers)

Si vous avez besoin du code source complet pour ce projet,
vous pouvez y accéder ici, ou vous pouvez obtenir le code source en utilisant ce qui suit.

# Pour Commencer
git clone https://github.com/Chenruii/BeneVoisin
(c'est le dépôt de l'auteur original qui a maintenant été nettoyé, mettez à jour le code de ce dépôt) prêt à l'emploi ; le tutoriel suivant est également de l'auteur original ;)

## Pré-requis
Tout d'abord, vous devez installer l'environnement PHP sur votre ordinateur et installer git. 
Besoin des logiciel.

Si vous souhaitez en savoir plus sur le composer, vous pouvez vous référer à ce site.
- [Docker CE](https://www.docker.com/community-edition)
- [Docker Compose](https://docs.docker.com/compose/install)

Symfony a également adopté ce serveur construit à partir de PHP en utilisant simplement sur la ligne de commande. 
php app/console server:run pour démarrer des applications basées sur Symfony. 

près avoir installé le compositeur, nous pouvons commencer à installer notre projet

## Installation
pour lancer la fixture
php bin/console doctrine:fixtures:load --purge-with-truncate

pour purger
php bin/console doctrine:fixtures:load --purger=my_purger

# Démarrage
cp .env.dist .env
demarrer docker
docker-compose up -d
docker-compose exec --user=application web composer install
lance le server 
docker-compose exec web php/console server:run

# Fabriqué avec
- Boostrap.css - Framework CSS (front-end)
- Phpstorm - IDE 

# Contributing
Voir le fichier CONTRIBUTING.md pour plus d'informations

# Versions
 V.1
# Author 
- Rui    @Chenruii
- Justine @jhilzheber
# License
Ce projet est sous licence MIT - voir le fichier LICENSE.md pour plus d'informations
