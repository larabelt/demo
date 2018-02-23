<?php

namespace App\Workflows;

use Belt\Core\Team;
use Belt\Core\Workflows\BaseWorkflow;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * @package App\Workflows
 */
class TeamApproval extends BaseWorkflow
    implements ShouldQueue
{
    const NAME = 'Team Approval';

    /**
     * cases:
     * - create by admin (and works on queued events)
     * - create by user
     * - update by admin
     * - update (targeted fields) by user
     * - update (non-targeted fields) by user
     */

    const KEY = 'team-approval';

    protected $initialPlace = 'draft';

    protected $places = ['draft', 'review', 'rejected', 'published'];

    protected $transitions = [
        'to_review' => [
            'from' => 'draft',
            'to' => 'review',
            //'label' => 'foo',
        ],
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
     * @param Team $team
     */
    public function applyPublish(Team $team)
    {
        $team->is_active = true;
        $team->save();
    }

    /**
     * @param Team $team
     */
    public function applyReject(Team $team)
    {
        $team->is_active = false;
        $team->save();
    }

}