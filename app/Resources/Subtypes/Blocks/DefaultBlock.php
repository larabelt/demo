<?php

namespace App\Resources\Subtypes\Blocks;

use App, Belt;

/**
 * Class DefaultBlock
 * @package App\Resources\Subtypes\Places
 */
class DefaultBlock extends Belt\Content\Resources\Subtypes\BaseBlock
{
    protected $key = 'default';
    protected $label = 'Default';
    protected $description = '';
    protected $path = 'belt-content::blocks.subtypes.default';
    protected $extends = 'belt-content::blocks.web.show';

    /**
     * @return array
     */
    public function params()
    {
        return [
            App\Resources\Params\Editor\BodyEditor::make(),
        ];
    }
}