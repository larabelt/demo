<?php

namespace App\Workflows;

use Belt\Core\Workflows\BaseWorkflow;
use Belt\Spot\Place;

/**
 * @package App\Workflows
 */
class PlaceApproval extends BaseWorkflow
{
    const NAME = 'Place Approval';

    const KEY = 'place-approval';

    protected $initialPlace = 'to_review';

    protected $places = ['to_review', 'published', 'rejected', 'published'];

    protected $transitions = [
        'publish' => [
            'from' => 'to_review',
            'to' => 'published',
        ],
        'reject' => [
            'from' => 'to_review',
            'to' => 'rejected',
        ],
    ];

    protected $closers = [
        'publish',
        'reject',
    ];

    /**
     * @return bool
     */
    public function begin($workable = null, $user = null, $payload = [])
    {
        if ($user && $user->is_super) {
            //return false;
        }

        return true;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();
        $array['label'] = '';
        $array['workable']['label'] = $this->getWorkable()->name ?? '';
        $array['workable']['editUrl'] = sprintf('/admin/belt/spot/places/edit/%s', $this->getWorkable()->id ?? null);

        return $array;
    }

    /**
     * @param Place $place
     */
    public function applyPublish(Place $place)
    {
        $place->is_active = true;
        $place->save();
    }

    /**
     * @param Place $place
     */
    public function applyReject(Place $place)
    {
        $place->is_active = false;
        $place->save();
    }

}