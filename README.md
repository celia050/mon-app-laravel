# Mini LMS - Plateforme pédagogique Laravel

## Prérequis
- PHP 8.2+
- Composer
- Node.js
- MySQL

## Installation

### 1. Installer PHP et Composer (Mac)
```bash
brew install php
brew install composer
```

### 2. Cloner ou décompresser le projet
```bash
cd mini-lms
```

### 3. Installer les dépendances
```bash
composer install
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run build
```

### 4. Configurer l'environnement
```bash
cp .env.example .env
php artisan key:generate
```

Modifier le fichier `.env` :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mini_lms
DB_USERNAME=root
DB_PASSWORD=

GROQ_API_KEY=votre_clé_groq
```

> Pour la clé Groq (IA) : créer un compte gratuit sur https://console.groq.com

### 5. Créer la base de données
Créer une base de données nommée `mini_lms` dans MySQL.

### 6. Lancer les migrations et les données de démo
```bash
php artisan migrate
php artisan db:seed --class=DemoSeeder
```

### 7. Lancer le projet
```bash
php artisan serve
```

Ouvrir : http://127.0.0.1:8000/login
Créer un profil utilisateur : http://127.0.0.1:8001/register

## Comptes de démonstration
| Rôle | Email | Mot de passe |

| Administrateur | admin@lms.fr | password |
| Apprenant | alice@lms.fr | password |
| Apprenant | celia@lms.fr | password |


## Fonctionnalités
- Gestion des formations, chapitres, sous-chapitres
- Quiz avec score automatique
- Génération de contenu et quiz par IA (Groq/Llama)
- Gestion des notes des apprenants
- Deux rôles : administrateur et apprenant

## Exemple de contenu inclus
- Formation : Anglais - Verbes irréguliers avec un chapitre "Les verbes irréguliers" et 3 sous-chapitre "10 verbes indispensables", "Définition des verbes irréguliers", "Méthode de mémorisation"
- Quiz généré par IA sur les verbes irréguliers, mémorisation, définition  (10 questions)