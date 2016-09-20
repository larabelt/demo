<?php

namespace App\Http\Controllers;

use App\Widget;

use Illuminate\Http\Request;
use Ohio\Core\Base\Http\Requests\BaseFormRequest;
use Ohio\Core\Base\Http\Requests\BasePaginateRequest;
use Ohio\Core\Base\Pagination\BaseLengthAwarePaginator;
use Ohio\Core\Base\Http\Controllers\BaseApiController;

class WidgetsController extends BaseApiController
{

    private function get($id)
    {
        try {
            $widget = Widget::findOrFail($id);
            return $widget;
        } catch (\Exception $e) {
            abort(404, 'Record not found.');
        }

        return null;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $request = new BasePaginateRequest($request->query());
        $request->perPage = 10;

        $paginator = new BaseLengthAwarePaginator(Widget::query(), $request);

        return response()->json($paginator->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BaseFormRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BaseFormRequest $request)
    {

        $widget = Widget::create($request->all());

        return response()->json($widget);
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
        $widget = $this->get($id);

        return response()->json($widget);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BaseFormRequest $request
     * @param  string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BaseFormRequest $request, $id)
    {
        $widget = $this->get($id);

        $widget->update($request->all());

        return response()->json($widget);
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
        $widget = $this->get($id);

        $widget->delete();

        return response()->json(null, 204);
    }
}
