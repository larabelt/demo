<?php

use Belt\Content\Handle;
use Belt\Content\Attachment;
use Belt\Content\Lyst;
use Belt\Content\Page;
use Belt\Menu\MenuItem;
use Belt\Core\Helpers\BeltHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeds extends Seeder
{

    use AttachmentSeedsTrait;

    /**
     * Run the database seeds.
     *
     * php artisan db:seed --class=PageSeeds
     *
     * @return void
     */
    public function run()
    {
        $disk = BeltHelper::baseDisk();

        Handle::unguard();
        Page::unguard();

        $data = [
            [
                'name' => 'About Us',
                'handles' => [
                    ['en', 'about-us'],
                ],
                'params' => [
                    'heading' => 'About Us',
                    'subheading' => 'People are the channels',
                    'jumbotron_enabled' => true,
                    'jumbotron_image' => $this->getOrCreateAttachment('people1.jpg', ['width' => 1440, 'height' => 500, 'category' => 'people']),
                    'jumbotron_title' => 'Capabilities',
                    'jumbotron_text' => 'Thinking wider has led us to a vast array of capabilities all designed to grow.',
                    'jumbotron_button_url' => 'https://google.com',
                    'jumbotron_button_text' => 'Learn More',
                ]
            ],
            [
                'name' => 'Home',
                'handles' => [
                    ['en', 'home'],
                ],
            ],
            [
                'name' => 'Contact Us',
                'handles' => [
                    ['en', 'contact-us'],
                ],
            ],
            [
                'name' => 'Privacy Policy',
                'handles' => [
                    ['en', 'privacy-policy'],
                ],
            ],
            [
                'name' => 'Frequently Asked Questions',
                'slug' => 'faqs',
                'handles' => [
                    ['en', 'faqs'],
                ],
            ],
        ];

        foreach ($data as $row) {

            $slug = array_get($row, 'slug', str_slug($row['name']));

            $page = Page::firstOrCreate([
                'name' => $row['name'],
            ]);

            $page->update([
                'is_active' => true,
                'slug' => $slug,
                'subtype' => $row['subtype'] ?? 'default',
            ]);

            if ($body = $disk->get("database/seeds/pages/$slug.html")) {
                $page->saveParam('body', $body);
            }

            DB::table('handles')->where(['handleable_type' => 'pages', 'handleable_id' => $page->id])->delete();

            $handles = array_get($row, 'handles', []);

            foreach ((array) $handles as $n => $row2) {
                $handle = $page->handles()->firstOrCreate([
                    'locale' => $row2[0],
                    'url' => $row2[1],
                ]);
                $handle->update([
                    'subtype' => 'alias',
                    'is_active' => true,
                    'is_default' => $n == 0,
                ]);
            }

            foreach (array_get($row, 'params', []) as $key => $value) {
                if (is_object($value)) {
                    $value = $value->id;
                }
                $page->saveParam($key, $value);
            }
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

            $handle = Handle::where('url', "/$slug")->first();
            if ($handle) {
                if ($handle->handleable_type == 'lists') {
                    $template = 'list';
                }
                if ($handle->handleable_type == 'pages') {
                    $template = 'page';
                }
                if ($handle->handleable_type == 'places') {
                    $template = 'place';
                }
            } elseif ($template == 'default') {
                dump($menuItem->toArray());
            }

            $menuItem->update([
                'name' => $label,
                'subtype' => $template,
                'url' => array_get($params, 'url'),
                'target' => array_get($params, 'target', '_self'),
            ]);

            if ($handle) {
                if ($handle->handleable_type == 'lists') {
                    $menuItem->saveParam('lists', $handle->handleable_id);
                }
                if ($handle->handleable_type == 'pages') {
                    $menuItem->saveParam('pages', $handle->handleable_id);
                }
            }

            foreach (array_get($params, 'params', []) as $key => $value) {
                $menuItem->saveParam($key, $value);
            }

            $this->children($menuGroup, array_get($params, 'children'), $menuItem);
        }
    }
}