<?php

namespace App\Workflows;

use Belt\Core\Team;
use Belt\Core\Workflows\BaseWorkflow;

/**
 * @package App\Workflows
 */
class TeamApproval extends BaseWorkflow
{
    const NAME = 'Team Approval';

    const KEY = 'team-approval';

    protected static $events = [
        'teams.created',
        'teams.updated',
    ];

    protected static $initialPlace = 'draft';

    protected static $places = [
        'draft',
        'review',
        'rejected',
        'published'
    ];

    protected static $transitions = [
        'to_review' => [
            'from' => 'draft',
            'to' => 'review',
        ],
        'publish' => [
            'from' => 'review',
            'to' => 'published',
        ],
        'reject' => [
            'from' => 'review',
            'to' => 'rejected',
        ],
        'start_over' => [
            'from' => 'rejected',
            'to' => 'review',
        ],
    ];

    protected static $closers = [
        'publish',
        'reject',
    ];

    /**
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();
        $array['label'] = '';
        $array['workable']['label'] = $this->getWorkable()->name ?? '';
        $array['workable']['editUrl'] = sprintf('/admin/belt/core/teams/edit/%s', $this->getWorkable()->id ?? null);

        return $array;
    }

    /**
     * @param array $params
     */
    public function start($params = [])
    {
        if ($team = array_get($params, 'workable', $this->getWorkable())) {
            $team->is_active = true;
            $team->save();
        }
    }

    /**
     * @param array $params
     */
    public function applyPublish($params = [])
    {
        if ($team = array_get($params, 'workable', $this->getWorkable())) {
            $team->is_active = true;
            $team->save();
            if ($user = $team->defaultUser) {
                $user->is_active = true;
                $user->save();
            }
        }
    }

    /**
     * @param array $params
     */
    public function applyReject($params = [])
    {

        if ($team = array_get($params, 'workable', $this->getWorkable())) {
            $team->is_active = false;
            $team->save();
        }
    }

}