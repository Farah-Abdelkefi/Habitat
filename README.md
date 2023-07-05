

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
composer install
cp .env.example .env
```

Then create the necessary database.

```
php artisan db
create database habitat
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```
