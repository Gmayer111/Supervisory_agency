# Supervisory_agency

## Evaluation d'entrainement pour la réalisation d'une application back-end en PHP

### Divers (dépendances, projet...)

- Extension PDO pour communiquer avec la BDD
- Application du design pattern MVC
- BDD relationnelle avec MySQL et gestion avec phpMyAdmin

### Déploiement sur Heroku

- Initialisation d’un projet Heroku avec la commande heroku create
- Création du fichier procfile avec la commande echo 'web: heroku-php-apache2 public/' > Procfile
- Installation d’une base de donnée distante avec l’addons JawsDB mysql : heroku addons:create jawsdb:kitefin
- Paramètrage du fichier .env
- Par défaut Heroku va jouer le composer install, il faut donc indiquer à heroku de faire les migrations de la base de données
- Modification du fichier .htacces qui va venir indiquer à apache comment réécrire les url avec le bundle composer require symfony/apache-pack
- Push vers le remote heroku avec la commande git push heroku main pour verssionner mon projet vers le dépôt heroku





