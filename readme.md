## Quick Larabelt Installation

```
php artisan belt install
```

## Manual Larabelt Installation

```
# create .env file
cp .env.example .env

# install composer dependencies
composer install

# create app key
php artisan key:generate

# install assets & migrate
php artisan belt-core:publish
php artisan belt-clip:publish
php artisan belt-content:publish
php artisan belt-glue:publish
php artisan belt-menu:publish
php artisan belt-spot:publish
composer dumpautoload

# migrate & seed
php artisan migrate
php artisan db:seed --class=BeltCoreSeeder
php artisan db:seed --class=BeltClipSeeder
php artisan db:seed --class=BeltContentSeeder
php artisan db:seed --class=BeltGlueSeeder
php artisan db:seed --class=BeltSpotSeeder
```

## Asset Installation

```
# install node dependencies
yarn install

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
# run belt publish cmds
php artisan belt publish

# run belt seeds
php artisan seed

# refresh belt migrations with seeds
php artisan belt refresh
```

## Acknowledgments / Credits

* [AdminLTE] (https://github.com/almasaeed2010/AdminLTE)