# Installation Laravel


## Installation de PHP


PHP 8.2.11 (cli) (construit le 1er octobre 2021 à 15h00) ou une version plus récente est requise.
**For Windows:**
Téléchargez PHP depuis le site officiel : https://windows.php.net/download/
Extrayez le fichier ZIP téléchargé dans un répertoire de votre choix (par exemple, C:\php)
Ajoutez le répertoire PHP à la variable d'environnement PATH de votre système

**For macOS:**
Installez Homebrew (si ce n'est pas déjà fait)
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

Installez PHP en utilisant Homebrew
```bash
    brew install php
```

For Linux (Ubuntu):
```bash
sudo apt update
sudo apt install php
```

## Installation de Composer
**Pour Windows:**

Téléchargez et exécutez l'installateur Composer à partir de: https://getcomposer.org/download/
Suivez les instructions de l'assistant d'installation

**Pour macOS et Linux:**

Exécutez la commande suivante dans votre terminal
```bash
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer
    php -r "unlink('composer-setup.php');"
```


Vérifiez les installations de PHP et Composer

```bash
    php --version
    composer --version
```
## Guide de Démarrage pour Lab CRUD

1. Ouvrez votre terminal.
2. Accédez au répertoire app

```bash
cd app
```
3. Installer les dépendances Composer :

```bash
composer install
npm install
```


1. Créer un fichier .env en copiant .env.example :
   
```bash
cp .env.example .env
```

5. Configuration de la Base de Données pour un Projet Laravel
   
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=password
```
6. Générer une clé d'application avec artisan :

```bash
php artisan key:generate
```
7. Migrer la base de données :

```bash
php artisan migrate
```
8. Exécuter les seeders pour peupler la base de données :
   
```bash
php artisan db:seed
```

9. Installer les dépendances npm :

```bash
php artisan serve
```

- Compiler les assets avec npm :

```bash
npm run build
```

<!-- TODO :Loin and password   -->
## Loin and password 