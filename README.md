# HNGx Task Two
######HNGX backend programming task two


## Installation
* Clone Repo
* Install composer
* Install npm
* Create Sqlite Database

```bash
composer install
```
```bash
npm install
```
*Duplicate the .env file

```bash
cp .env.example .env
```

*On the root folder, create sqlite database, copy the sqlite database file path and paste on .env file DB_DATABASE


* Generate app key

```bash
php artisan key:generate
```

* Run Migrations

```bash
php artisan migrate --seed
```
*Start laravel Server 
```bash
php artisan serve
```
*Server starts at 127.0.0.1:8000 
```bash
```
*Add /api to the url on postman 



*View documentation of this project 
```bash
https://documenter.getpostman.com/view/29639508/2s9YC5zYK1
```
[comment]: <> (Check the docs [here]&#40;https://documenter.getpostman.com/view/7185838/TVetaR6x&#41;)
