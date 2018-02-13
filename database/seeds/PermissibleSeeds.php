<?php

use Belt\Core\Ability;
use Belt\Core\Role;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade;

class PermissibleSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ability::unguard();
        $abilities = [
            // core
            '*' => '*',
            '' => [
                'admin-dashboard',
            ],
            'alerts',
            'teams',
            'users',
            // clip
            'albums',
            'attachments',
            // content
            'blocks',
            'favorites',
            'handles',
            'pages',
            'posts',
            'touts',
            // glue
            'categories',
            'tags',
            // menu
            'menu-groups',
            'menu-items',
            // spot
            'amenities',
            'deals',
            'events',
            'itineraries',
            'places',
        ];
        foreach ($abilities as $entity_type => $set) {
            if (is_numeric($entity_type)) {
                $entity_type = $set;
                $set = ['*', 'create', 'view', 'update', 'delete'];
            }
            $set = is_array($set) ? $set : [$set];
            foreach ($set as $ability) {
                Ability::firstOrCreate([
                    'entity_type' => $entity_type ?: null,
                    'name' => $ability,
                    'entity_id' => null,
                ]);
            }
        }

        Role::firstOrCreate(['name' => 'super']);
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'editor']);

        BouncerFacade::allow('super')->everything();
        BouncerFacade::allow('editor')->to('admin-dashboard');
    }
}
