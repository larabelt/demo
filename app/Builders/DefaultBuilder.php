<?php

namespace App\Builders;

use Belt\Content\Builders\BaseBuilder;
use Belt\Content\Attachment;

/**
 * Class DefaultBuilder
 *
 * Example class to add some sections automatically to a new sectionable item
 *
 * @package App\Builders
 */
class DefaultBuilder extends BaseBuilder
{
    public function build()
    {
//        $attachment = Attachment::query()->orderBy('id', 'DESC')->first();
//
//        $this->section([
//            'sectionable_type' => $attachment->getMorphClass(),
//            'sectionable_id' => $attachment->id,
//        ]);

        $this->section([
            'heading' => 'Page Section Title',
            'before' => 'Main Page Section Content',
        ]);
    }

}
