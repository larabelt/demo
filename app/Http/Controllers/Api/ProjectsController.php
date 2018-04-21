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
     * @param  string $projectKey
     *
     * @return \Illuminate\Http\Response
     */
    public function show($projectKey)
    {
        $project = $this->service()->getProject($projectKey);

        return response()->json($project);
    }

}
