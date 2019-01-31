<?php

use Belt\Content\Attachment;
use Belt\Core\Helpers\BeltHelper;
use Belt\Core\Helpers\FactoryHelper;

trait AttachmentSeedsTrait
{
    /**
     * @param $filename
     * @param $params
     * @return mixed
     * @throws Exception
     */
    public function getOrCreateAttachment($filename, $params)
    {
        $helper = (new FactoryHelper())->loadImages();

        $disk = BeltHelper::baseDisk();

        $width = array_get($params, 'width', 640);
        $height = array_get($params, 'height', 640);
        $category = array_get($params, 'category', null);

        $upload = false;
        $path = 'storage/app/public/local/uploads/' . $filename;
        if (!$disk->exists($path)) {
            $upload = true;
            $path = $helper->addImage(['width' => $width, 'height' => $height, 'category' => $category]);
        }

        $result = $helper->uploadImage($path, $filename, $upload);

        $attachments = factory(Attachment::class, 1)->create($result);

        return $attachments->first();
    }

}