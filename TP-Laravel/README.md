```bash
composer create-project --prefer-dist laravel/laravel Mini-Projet-Laravel
php artisan migrate
php artisan serve
```

- app 
Ce répertoire contient l’intégralité du code source de notre projet. Il comprend les événements, les 
commandes, les exceptions, etc. 

- config 
Comme son nom l’indique, il stocke tous les fichiers de configuration de notre projet. 

- database 
Le répertoire database est l’endroit où nous mettons tous les fichiers de population et de migration. 
Ils déterminent la structure de la base de données. 

- public 
Ce répertoire contient le fichier index.php, qui est le point d’entrée de toutes les requêtes. Nous 
devons également placer tous les fichiers statiques (CSS et JS) dans ce répertoire qui seront générer à 
partir des fichier CSS et JS du répertoire resources. 

- routes 
routes contient toutes les déclarations d’URL pour notre projet. Par défaut, il y a quatre fichiers route 
: web.php, api.php, console.php et channels.php.  

- resources 
Ce dossier stocke toutes les vues et les fichiers non compilés tels que LESS, SASS ou JavaScript. 

## Répertoires du dossier app 
- Http/Controllers 
C’est ici que nous plaçons tous les contrôleurs de notre projet. Toute la logique permettant de traiter 
les demandes entrant dans votre application sera placée dans ce répertoire. Pour rappel, les 
contrôleurs sont les intermédiaires entre nos vues et nos modèles. 

- Models 
Le dossier Models (venu avec Laravel 8) contient toutes vos classes de modèles Eloquent. L’ORM 
Eloquent inclus avec Laravel fournit une belle et simple implémentation ActiveRecord pour travailler 
avec votre base de données. Chaque table de votre base de données a un « modèle » correspondant 
qui est utilisé pour interagir avec cette table. Les modèles vous permettent d’interroger les données 
de vos tables, ainsi que d’insérer de nouveaux enregistrements dans la table. 

## Migrations 

```bash
php artisan make:migration create_clients_table
```
- up : ici on a le code de création de la table et de ses colonnes 
- down : ici on a le code de suppression de la table 

- Pour annuler une migration on utilise la commande rollback. Cette commande annule le
dernier " lot " de migrations, qui peut inclure plusieurs fichiers de migration

```bash
php artisan migrate:rollback
```

Les méthodes down des migrations sont exécutées et les tables seront supprimées.

- La commande fresh supprime automatiquement les tables concernées.

```bash
php artisan migrate:fresh
```

- Pour annuler et relancer en une seule opération on utilise la commande refresh. La commande
migrate:refresh annulera toutes vos migrations, puis exécutera la commande migrate. Cette
commande recrée efficacement toute votre base de données.

```bash
php artisan migrate:refresh
```

La commande migrate:reset annulera toutes les migrations de votre application :

```bash
php artisan migrate:reset
```

## Modèles

le nom des modèles doit commencé en majiscule et être au singulier. Il serve d'intermediaire entre le code et la base de données. ci dessus la synthaxe de création d'un modèle.

```bash
php artisan make:model Client 
```

Une seule commande peut à la fois créer le modèle et le fichier de migration en une seule opération
Le nom du model peut être placé avant ou après l’option (-m ou  --migration) 

```bash
php artisan make:model Contact -m
php artisan make:model Contact --migration  
```

## Seeders

Les seeders permettent de remplir la base de données pour le test.
Par convention, les noms des classes de seeding sont écrits dans ce format : ClientsTableSeeder.

Pour générer un Seeder, il suffit d’exécuter la commande suivante :

```bash
php artisan make:seeder ClientsTableSeeder  
```

Excuter un seeder

```bash
php artisan db:seed --class= ClientsTableSeeder 
```

## Factories

Les Factories (“usines” en anglais) sont donc là pour nous permettre de créer des enregistrements 
en quantité et d’établir facilement diverses relations entre nos tables. 

Générer un factories

```bash
php artisan make:factory ClientFactory --model=Client 
```

Voici une commande plus rapide qui combine le migrate:fresh et le 
php artisan db:seed 

```bash
php artisan migrate:fresh --seed  
```

##  Le Controller 

Les Controllers permettent de regrouper les logiques de réponse aux requêtes http reliées dans la même 
classe. 

Générer un controller

```bash
php artisan make:controller ClientController
``` 

- Avec --resource le contrôleur contiendra une méthode pour chacune des opérations de ressources 
disponibles – index(), create(), store(), show(), edit(), update(), destroy(). 

- Avec --api utilisée comme --resource mais génère 5 méthodes : index(), store(), show(), update(), 
destroy(). Puisque les formulaires create/edit n’ont pas de besoin dans API. 

- On peut utiliser une seule commande pour créer model migrate et controller avec l’option -mcr qui est 
le raccourci de --migration --controller --resource 

```bash
php artisan make:model Contact --migration --controller --resource 
``` 

## Routing

- Commande pour connaître les routes prévues dans le code

```bash
php artisan route:list  
```

## Création des vues avec Blade 

- layout.blade.php 
Créer ce fichier dans le répertoire « views ». 
Ce template comporte la structure globale des pages et est déclaré comme parent par les autres vues 
: @extends('template').

@yield('content') sera remplacé par le contenu spécifique à la vue qui hérite de layout 