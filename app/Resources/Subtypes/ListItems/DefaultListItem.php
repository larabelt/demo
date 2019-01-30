<?php

namespace App\Resources\Subtypes\ListItems;

use App, Belt;

/**
 * Class DefaultListItem
 * @package App\Resources\Subtypes\Places
 */
class DefaultListItem extends Belt\Content\Resources\Subtypes\BaseListItem
{
    protected $key = 'default';
    protected $label = 'Default ';
    protected $description = '';
    protected $extends = 'belt-content::list_items.web.show';
    protected $path = 'belt-content::list_items.subtypes.default';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\Params\Text\Heading::make(),
            App\Resources\Params\Editor\BodyEditor::make(),
        ];
    }

}