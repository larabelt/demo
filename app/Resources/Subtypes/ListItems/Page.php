<?php

namespace App\Resources\Subtypes\ListItems;

use App, Belt;

/**
 * Class Page
 * @package App\Resources\Subtypes\Places
 */
class Page extends Belt\Content\Resources\Subtypes\BaseListItem
{
    protected $key = 'page';
    protected $label = 'Page';
    protected $description = '';
    protected $extends = 'belt-content::list_items.web.show';
    protected $path = 'belt-content::list_items.subtypes.default';
    protected $tile = 'tile-page-list-item';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\Params\Text\Heading::make(),
            App\Resources\Params\Editor\BodyEditor::make(),
            App\Resources\Params\Page\DefaultPage::make(),
        ];
    }

}