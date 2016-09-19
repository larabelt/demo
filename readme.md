Database migration

```php artisan migrate
```
```php artisan db:seed
```
```php artisan migrate:refresh --seed #re-run all migrations with seeds
```

Clear App & PHP cache

```composer run-script clear; sudo service php7.0-fpm restart;
```

```gulp --gulpfile vendor/ohiocms/core/gulpfile.js
```

```gulp watch --gulpfile vendor/ohiocms/core/gulpfile.js
```

```php artisan vendor:publish --provider="Ohio\Core\Base\OhioCoreServiceProvider"
```