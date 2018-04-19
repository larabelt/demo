<?php

namespace App\Http\Controllers\Api;

use App, Belt;
use App\Http\Requests;
use App\Project;
use App\Services\ProjectsService;
use Belt\Core\Http\Controllers\ApiController;
use Belt\Core\Http\Controllers\Behaviors\SpreadSheet;
use Illuminate\Http\Request;

class ProjectsController extends ApiController
{
    use SpreadSheet;

    /**
     * @var Project
     */
    public $projects;

    /**
     * @var ProjectsService
     */
    public $service;

    /**
     * @return ProjectsService
     */
    public function service()
    {
        if ($this->service) {
            return $this->service;
        }

        $service = new ProjectsService();
        $service->console = $this;

        return $this->service = $service;
    }

    /**
     * ApiController constructor.
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->projects = $project;
    }

    public function get($id)
    {
        return $this->projects->find($id) ?: $this->abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$this->authorize('view', Project::class);

        $package = $request->get('package');

        $service = new \App\Services\GitService();

        $base_path = base_path();

        //dump($base_path);
        //dump($base_path . '/../core');

        //$response = $service->status('core');

        $service->cmd([
            $service->cd($package),
            'git status',
            'git status --porcelain',
        ]);

        exit;
        return response();
        //return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\StoreProject $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreProject $request)
    {
        $this->authorize('create', Project::class);

        $input = $request->all();

        $project = $this->projects->create([
            'email' => $input['email'],
        ]);

        $this->set($project, $input, [
            'is_active',
            'team_id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'postcode',
            'comment',
            'source',
            'submitted_at',
        ]);

        $project->save();

        $this->itemEvent('created', $project);

        return response()->json($project, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->get($id);

        $this->authorize('view', $project);

        $project->team;

        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\UpdateProject $request
     * @param  string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateProject $request, $id)
    {
        $project = $this->get($id);

        $this->authorize('update', $project);

        $input = $request->all();

        $this->set($project, $input, [
            'is_active',
            'team_id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'postcode',
            'comment',
            'source',
            'submitted_at',
        ]);

        $project->save();

        $this->itemEvent('updated', $project);

        return response()->json($project);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = $this->get($id);

        $this->authorize('delete', $project);

        $this->itemEvent('deleted', $project);

        $project->delete();

        return response()->json(null, 204);
    }
}
