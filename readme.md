## Installation

```
# install node dependencies
yarn install

# create .env file
cp .env.example .env

# install composer dependencies
composer install

# create app key
php artisan key:generate

# install assets & migrate
php artisan belt-core:publish
php artisan belt-content:publish
php artisan belt-menu:publish
php artisan belt-spot:publish
php artisan belt-clip:publish
composer dumpautoload

# migrate & seed
php artisan migrate
php artisan db:seed --class=BeltCoreSeeder
php artisan db:seed --class=BeltContentSeeder
php artisan db:seed --class=BeltSpotSeeder
php artisan db:seed --class=BeltClipSeeder

# compile assets
npm run dev
npm run watch
```

## Clear App & PHP Cache

```
composer run-script clear; 
sudo service php7.0-fpm restart;
```

## Misc

```
#re-run all migrations with seeds
php artisan migrate:refresh --seed 
```

## Acknowledgments / Credits

* [AdminLTE] (https://github.com/almasaeed2010/AdminLTE)