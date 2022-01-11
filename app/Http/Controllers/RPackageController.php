<?php

namespace App\Http\Controllers;

use App\Http\Requests\RPackageStoreRequest;
use App\Http\Requests\RPackageUpdateRequest;
use App\Http\Resources\RPackageCollection;
use App\Http\Resources\RPackageResource;
use App\Models\RPackage;
use Illuminate\Http\Request;

class RPackageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\RPackageCollection
     */
    public function index(Request $request)
    {
        $rPackages = RPackage::all();

        return new RPackageCollection($rPackages);
    }

    /**
     * @param \App\Http\Requests\RPackageStoreRequest $request
     * @return \App\Http\Resources\RPackageResource
     */
    public function store(RPackageStoreRequest $request)
    {
        $rPackage = RPackage::create($request->validated());

        return new RPackageResource($rPackage);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RPackage $rPackage
     * @return \App\Http\Resources\RPackageResource
     */
    public function show(Request $request, RPackage $rPackage)
    {
        return new RPackageResource($rPackage);
    }

    /**
     * @param \App\Http\Requests\RPackageUpdateRequest $request
     * @param \App\Models\RPackage $rPackage
     * @return \App\Http\Resources\RPackageResource
     */
    public function update(RPackageUpdateRequest $request, RPackage $rPackage)
    {
        $rPackage->update($request->validated());

        return new RPackageResource($rPackage);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RPackage $rPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RPackage $rPackage)
    {
        $rPackage->delete();

        return response()->noContent();
    }
}
