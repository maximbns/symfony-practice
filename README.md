# symfony-practice

## Installation
Il est nécessaire d'importer la base de données de l'application avec le fichier exo_sf_maximbns.sql pour faire fonctionner l'application.
```
# Cloner le projet
git clone https://github.com/maximbns/symfony-practice.git

# Installer les dépendances
cd symfony-practice
composer install
# Lorsque demandé, adaptez les valeurs database_host, database_name, database_user et database_password selon votre configuration
```

## Fonctionnement

L'application est composée de 5 routes

`GET /blog/articles`
Affiche la liste des articles sous forme d'une page HTML

`GET /blog/article/{id}`
Affiche un article sous forme d'une page HTML

`GET /api/articles`
Affiche la liste des articles sous forme d'un JSON

`GET /api/article/{id}`
Affiche un article sous forme d'un JSON

`POST /api/article/create`
Permet de créer un article à partir d'un JSON. Le format attendu est le suivant :
```
{
    "title": "Mon titre",
    "description": "Ma description"
}
```