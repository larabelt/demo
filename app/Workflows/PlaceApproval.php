<?php

namespace App\Workflows;

use Belt\Workflow\Workflows\BaseWorkflow;
use Belt\Spot\Place;

/**
 * @package App\Workflows
 */
class PlaceApproval extends BaseWorkflow
{
    const NAME = 'Place Approval';

    const KEY = 'place-approval';

    protected static $events = [
        'places.created',
        'places.updated',
        'places.sections.updated',
    ];

    protected static $initialPlace = 'review';

    protected static $places = [
        'review',
        'rejected',
        'published'
    ];

    protected static $transitions = [
        'publish' => [
            'from' => 'review',
            'to' => 'published',
        ],
        'reject' => [
            'from' => 'review',
            'to' => 'rejected',
        ],
    ];

    protected static $closers = [
        'publish',
        'reject',
    ];

    /**
     * @return bool
     */
    public function shouldStart($params = [])
    {
        $user = array_get($params, 'user');

        if ($user && $user->is_super) {
            return false;
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
     * @param array $params
     */
    public function start($params = [])
    {
        if ($place = array_get($params, 'workable', $this->getWorkable())) {
            $place->is_active = false;
            $place->save();
        }
    }

    /**
     * @param array $params
     */
    public function applyPublish($params = [])
    {
        if ($place = array_get($params, 'workable', $this->getWorkable())) {
            $place->is_active = true;
            $place->save();
        }
    }

    /**
     * @param array $params
     */
    public function applyReject($params = [])
    {
        if ($place = array_get($params, 'workable', $this->getWorkable())) {
            $place->is_active = false;
            $place->save();
        }
    }

}