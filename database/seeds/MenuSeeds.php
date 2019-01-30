<?php

use Belt\Content\Handle;
use Belt\Content\Lyst;
use Belt\Content\Page;
use Belt\Menu\MenuGroup;
use Belt\Menu\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * php artisan db:seed --class=MenuSeeds
     *
     * @return void
     */
    public function run()
    {
        MenuGroup::unguard();
        MenuItem::unguard();

        DB::table('menu_groups')->truncate();
        DB::table('menu_items')->truncate();

        $menus = [
            'Main' => [
                'children' => [
                    'Home' => [
                        'url' => '/home'
                    ],
                    'About Us' => [
                        'url' => '/about-us'
                    ],
                ]
            ],
            'Global' => [
                'children' => [
                    'Contact Us' => [
                        'url' => '/contact-us'
                    ],
                ]
            ],
            'Footer' => [
                'children' => [
                    'About Us' => [
                        'url' => '/about-us'
                    ],
                    'Privacy Policy' => [
                        'url' => '/privacy-policy'
                    ],
                    'Site Map' => [
                        'url' => '/site-map'
                    ],
                    'FAQs' => [
                        'url' => '/faqs'
                    ],
                ]
            ],
            'Social Media' => [
                'children' => [
                    'Facebook' => [
                        'url' => 'https://www.facebook.com/laravel',
                        'subtype' => 'social_media',
                        'params' => [
                            'icon' => 'fab fa-facebook-square',
                        ]
                    ],
                    'Twitter' => [
                        'url' => 'https://twitter.com/laravelphp',
                        'subtype' => 'social_media',
                        'params' => [
                            'icon' => 'fab fa-twitter',
                        ]
                    ],

                ]
            ]
        ];

        foreach ($menus as $group => $params) {

            $menuGroup = MenuGroup::firstOrCreate([
                'name' => $group,
                'slug' => str_slug($group),
            ]);

            $this->children($menuGroup, array_get($params, 'children'));
        }

    }

    public function children($menuGroup, $children, MenuItem $parent = null)
    {

        foreach ((array) $children as $label => $params) {

            $slug = str_slug($label);
            $template = array_get($params, 'subtype', 'default');

            $menuItem = MenuItem::firstOrCreate([
                'parent_id' => $parent ? $parent->id : null,
                'menu_group_id' => $menuGroup->id,
                'slug' => $slug,
            ]);

            if ($handle = Handle::where('url', "/$slug")->first()) {
                if ($handle->handleable_type == 'lists') {
                    $template = 'list';
                    $menuItem->saveParam('lists', $handle->handleable_id);
                }
                if ($handle->handleable_type == 'pages') {
                    $template = 'page';
                    $menuItem->saveParam('pages', $handle->handleable_id);
                }
                if ($handle->handleable_type == 'places') {
                    $template = 'place';
                }
            }

            if ($template == 'default') {
                if ($page = Page::sluggish($slug)->first()) {
                    $template = 'page';
                    $menuItem->saveParam('pages', $page->id);
                }
            }

            if ($template == 'default') {
                dump($menuItem->toArray());
            }

            $menuItem->update([
                'name' => $label,
                'label' => $label,
                'subtype' => $template,
                'url' => array_get($params, 'url'),
                'target' => array_get($params, 'target', '_self'),
            ]);

            foreach (array_get($params, 'params', []) as $key => $value) {
                $menuItem->saveParam($key, $value);
            }

            $this->children($menuGroup, array_get($params, 'children'), $menuItem);
        }
    }
}