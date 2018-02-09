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
    const NAME = 'team-approval';

    protected $places = ['draft', 'review', 'rejected', 'published'];

    protected $initialPlace = 'draft';

    protected $transitions = [
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
    ];

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
    public function handle($event, $test = null)
    {
        dump(111);
        dump($test);
        dump($event);
        dump($event->morph());

        /* @var $team Team */
        $team = $event->morph();

        $this->setItem($team);
        $this->create(['hey' => 'there']);
    }

}