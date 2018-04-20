<?php

namespace App\Http\Controllers\Api;

use App, Belt;
use App\Services\Projects\ProjectService;
use Belt\Core\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ProjectsController extends ApiController
{

    /**
     * @var ProjectService
     */
    public $service;

    /**
     * @return ProjectService
     */
    public function service()
    {
        return $this->service ?: $this->service = new ProjectService();
    }

    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = config('projects');

        $data = [];
        foreach ($projects as $key => $project) {
            $data[$key]['meta'] = array_get($project, 'meta', []);
            $data[$key]['meta']['key'] = $key;
        }

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        $config = config("projects.$key", []);

        $project = new App\Project($config);

        $this->service()->setProject($key);

        return response()->json($project);
    }

}
