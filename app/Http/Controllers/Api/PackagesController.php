<?php

namespace App\Http\Controllers\Api;

use App, Belt;
use App\Services\Projects\ProjectService;
use Belt\Core\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class PackagesController extends ApiController
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
     * Display the specified resource.
     *
     * @param $projectKey
     * @param $packageKey
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($projectKey, $packageKey)
    {
        $package = $this->service()->getPackage($projectKey, $packageKey);

        return response()->json($package);
    }

    /**
     * @param Request $request
     * @param $projectKey
     * @param $packageKey
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $projectKey, $packageKey)
    {
        $package = $this->service()->getPackage($projectKey, $packageKey);

        if ($recipe = $request->get('recipe')) {
            if ($recipe == 'git-status') {
                $service = new \App\Services\GitService();
                $service->cmd([
                    $service->cd(array_get($package, 'path')),
                    'git status',
                ]);
                exit;
            }
        }

        return response()->json($package);
    }

}
