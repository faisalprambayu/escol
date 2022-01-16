<?php

namespace App\Http\Controllers;

use App\Http\Requests\RClassStoreRequest;
use App\Http\Requests\RClassUpdateRequest;
use App\Http\Resources\RClassCollection;
use App\Http\Resources\RClassResource;
use App\Models\RClass;
use Illuminate\Http\Request;

class RClassController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\RClassCollection
     */
    public function index(Request $request)
    {
        $rClasses = RClass::orderBy('updated_at', 'DESC')->get();

        // dump($rClasses);
        return new RClassCollection($rClasses);
    }

    /**
     * @param \App\Http\Requests\RClassStoreRequest $request
     * @return \App\Http\Resources\RClassResource
     */
    public function store(RClassStoreRequest $request)
    {
        $rClass = RClass::create($request->validated());
        return redirect('ref_class');
        // return new RClassResource($rClass);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RClass $rClass
     * @return \App\Http\Resources\RClassResource
     */
    public function show(Request $request, RClass $rClass)
    {
        return new RClassResource($rClass);
    }

    /**
     * @param \App\Http\Requests\RClassUpdateRequest $request
     * @param \App\Models\RClass $rClass
     * @return \App\Http\Resources\RClassResource
     */
    public function update(RClassUpdateRequest $request, RClass $rClass)
    {
        $rClass->update($request->validated());

        return new RClassResource($rClass);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RClass $rClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RClass $rClass)
    {
        $rClass->delete();
        return redirect('ref_class');
        // return response()->noContent();
    }
}
