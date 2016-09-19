Installation

```composer install
```
```npm install
```
```cp .env.example .env
```
```php artisan key:generate
```
```php artisan vendor:publish --provider="Ohio\Core\Base\OhioCoreServiceProvider"
```
```php artisan ohio:assets
```
```php artisan migrate
```
```php artisan db:seed
```
```gulp --gulpfile vendor/ohiocms/core/gulpfile.js
```

Clear App & PHP cache

```composer run-script clear; sudo service php7.0-fpm restart;
```

Misc

```php artisan migrate:refresh --seed #re-run all migrations with seeds
```

```gulp watch --gulpfile vendor/ohiocms/core/gulpfile.js
```