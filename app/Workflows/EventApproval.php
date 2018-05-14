<?php

namespace App\Workflows;

use Belt\Core\Workflows\BaseWorkflow;
use Belt\Spot\Event;

/**
 * @package App\Workflows
 */
class EventApproval extends BaseWorkflow
{
    const NAME = 'Event Approval';

    const KEY = 'event-approval';

    protected static $events = [
        'events.created',
        'events.updated',
        'events.sections.updated',
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
        $array['workable']['editUrl'] = sprintf('/admin/belt/spot/events/edit/%s', $this->getWorkable()->id ?? null);

        return $array;
    }

    /**
     * @param array $params
     */
    public function start($params = [])
    {
        if ($event = array_get($params, 'workable', $this->getWorkable())) {
            $event->is_active = false;
            $event->save();
        }
    }

    /**
     * @param Event $event
     */
    public function applyPublish(Event $event)
    {
        $event->is_active = true;
        $event->save();
    }

    /**
     * @param Event $event
     */
    public function applyReject(Event $event)
    {
        $event->is_active = false;
        $event->save();
    }

}