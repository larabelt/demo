<?php

namespace App\Http\Controllers\Api;

use App, Belt;
use App\Http\Requests;
use App\Package;
use App\Services\PackagesService;
use Belt\Core\Http\Controllers\ApiController;
use Belt\Core\Http\Controllers\Behaviors\SpreadSheet;
use Illuminate\Http\Request;

class PackagesController extends ApiController
{
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($project, $owner, $name)
    {
        $package = config("projects.$project.packages.$owner.$name", []);

        return response()->json($package);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project, $owner, $name)
    {
        $package = config("projects.$project.packages.$owner.$name", []);

        if ($recipe = $request->get('recipe')) {
            if ($recipe == 'git-status') {
                $service = new \App\Services\GitService();
                $service->cmd([
                    $service->cd(array_get($package, 'meta.path')),
                    'git status',
                ]);
                exit;
            }
        }

        return response()->json($package);
    }

}
