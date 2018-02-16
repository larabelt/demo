<?php

namespace App\Workflows;

use Auth;
use Belt\Core\Team;
use Belt\Core\Workflows\BaseWorkflow;
use Belt\Core\Events\TeamCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * @package App\Workflows
 */
class TeamApproval extends BaseWorkflow
    //implements ShouldQueue
{
    /**
     * cases:
     * - create by admin
     * - create by user
     * - update by admin
     * - update (targeted fields) by user
     * - update (non-targeted fields) by user
     */

    const NAME = 'Team Approval';

    protected $places = ['draft', 'review', 'rejected', 'published'];

    protected $initialPlace = 'draft';

    protected $transitions = [
        'to_review' => [
            'from' => 'draft',
            'to' => 'review',
            //'label' => 'foo',
        ],
        'publish' => [
            'from' => 'review',
            'to' => 'published',
        ],
        'reject' => [
            'from' => 'review',
            'to' => 'rejected',
        ],
    ];

    protected $close = [
        'publish',
        'reject',
    ];

    public function toArray()
    {
        $array = parent::toArray();
        $array['label'] = '';
        $array['item_label'] = $this->workRequest()->workable->name;
        $array['item_url'] = sprintf('/admin/belt/core/%s/edit/%s', $this->workRequest()->workable_type, $this->workRequest()->workable_id);

        return $array;
    }

    public function saved()
    {
        $this->create(['foo' => 'bar']);
    }

    /**
     * Handle the event.
     *
     * @param  TeamCreated $event
     * @return void
     */
    public function handle($event)
    {
        /* @var $team Team */
        $team = $event->morph();

        $this->setItem($team);

        $workRequest = $this->workRequest();
    }

    public function applyPublish($payload = [])
    {
        $this->item()->is_active = true;
        $this->item()->save();
    }

    public function applyReject($payload = [])
    {
        $this->item()->is_active = true;
        $this->item()->save();
    }

}