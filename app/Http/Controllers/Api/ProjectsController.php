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
        $project = config("projects.$key", []);

        return response()->json($project);
    }

}
