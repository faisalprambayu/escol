<?php

namespace App\Http\Controllers;

use App\Http\Requests\RMajorStoreRequest;
use App\Http\Requests\RMajorUpdateRequest;
use App\Http\Resources\RMajorCollection;
use App\Http\Resources\RMajorResource;
use App\Models\RMajor;
use Illuminate\Http\Request;

class RMajorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\RMajorCollection
     */
    public function index(Request $request)
    {
        $rMajors = RMajor::all();

        return new RMajorCollection($rMajors);
    }

    /**
     * @param \App\Http\Requests\RMajorStoreRequest $request
     * @return \App\Http\Resources\RMajorResource
     */
    public function store(RMajorStoreRequest $request)
    {
        $rMajor = RMajor::create($request->validated());

        return redirect('ref_major');
        // return new RMajorResource($rMajor);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RMajor $rMajor
     * @return \App\Http\Resources\RMajorResource
     */
    public function show(Request $request, RMajor $rMajor)
    {
        return new RMajorResource($rMajor);
    }

    /**
     * @param \App\Http\Requests\RMajorUpdateRequest $request
     * @param \App\Models\RMajor $rMajor
     * @return \App\Http\Resources\RMajorResource
     */
    public function update(RMajorUpdateRequest $request, RMajor $rMajor)
    {
        $rMajor->update($request->validated());

        return new RMajorResource($rMajor);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RMajor $rMajor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RMajor $rMajor)
    {
        $rMajor->delete();
        return redirect('ref_major');
        // return response()->noContent();
    }
}
