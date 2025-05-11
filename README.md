<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# GoTickets - Plateforme de billetterie pour événements locaux

GoTickets est une application de billetterie en ligne permettant aux utilisateurs de découvrir, réserver et gérer des billets pour des événements locaux. Le site est conçu pour être simple, rapide et sécurisé, tout en offrant une interface fluide pour une meilleure expérience utilisateur.

## Fonctionnalités principales
- **Découverte d'événements locaux** : Explorez des événements dans votre région (concerts, festivals, conférences, etc.).
- **Réservation de billets** : Achetez des billets directement sur la plateforme.
- **Gestion de compte utilisateur** : Créez et gérez votre compte personnel pour suivre vos réservations et événements préférés.
- **Authentification sécurisée** : Connexion et inscription avec une gestion sécurisée des sessions.
- **Interface d’administration** avec Filament (accès réservé aux administrateurs)


## Technologies utilisées
- **Backend** : [Laravel](https://laravel.com/) (Framework PHP)
- **Base de données** : [PostgreSQL](https://www.postgresql.org/)
- **Frontend** : [Bootstrap](https://getbootstrap.com/) (Framework CSS)
- **Authentification** : Laravel Breeze
- **Interface admin** : Filament 3
- **Sessions** : Laravel session (stockage dans la base de données PostgreSQL)


## Prérequis

Avant de démarrer, assurez-vous d'avoir les outils suivants installés :

- [PHP 8.x](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [PostgreSQL](https://www.postgresql.org/)
- npm


## Installation

### Étapes pour démarrer le projet

1. Clonez le repository :
   Clonez ce repository sur votre machine locale :
   
   ```bash
   git clone https://github.com/votre-utilisateur/gotickets.git
   cd gotickets

2. Installer les dépendances avec Composer :
   Une fois dans le répertoire du projet, installez les dépendances PHP :

   ```bash
   composer install
   npm install && npm run dev
   
3. Configurer la base de données :
   Assurez-vous d'avoir une base de données PostgreSQL en cours d'exécution et créez une base de données pour GoTickets :

   ```sql
   CREATE DATABASE gotickets;

4. Ensuite, configurez les informations de connexion à la base de données dans le fichier .env :

   ```dotenv
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=votre_nom_baseDeDonnées
   DB_USERNAME=votre_nom_utilisateur
   DB_PASSWORD=votre_mot_de_passe


5. Lancer les migrations :

   ```bash
   php artisan migrate


6. Démarrer le serveur :

   ```bash
   php artisan serve


## Licence
Ce projet est sous la licence MIT.


- ## 📫 Me contacter
Vous pouvez me joindre directement :

- [LinkedIn](https://www.linkedin.com/in/mohamed-alshahoud/)
- [Portfolio](https://mohamedalshahoud.com/)
- [Email](alshahoudmohamed95@gmail.com)


## Auteur
- **Mohamed Alshahoud** - Développeur Web Full Stack

---


