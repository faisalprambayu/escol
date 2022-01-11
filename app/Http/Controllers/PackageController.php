<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageStoreRequest;
use App\Http\Requests\PackageUpdateRequest;
use App\Http\Resources\PackageCollection;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\PackageCollection
     */
    public function index(Request $request)
    {
        $packages = Package::all();

        return new PackageCollection($packages);
    }

    /**
     * @param \App\Http\Requests\PackageStoreRequest $request
     * @return \App\Http\Resources\PackageResource
     */
    public function store(PackageStoreRequest $request)
    {
        $package = Package::create($request->validated());

        return new PackageResource($package);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Package $package
     * @return \App\Http\Resources\PackageResource
     */
    public function show(Request $request, Package $package)
    {
        return new PackageResource($package);
    }

    /**
     * @param \App\Http\Requests\PackageUpdateRequest $request
     * @param \App\Models\Package $package
     * @return \App\Http\Resources\PackageResource
     */
    public function update(PackageUpdateRequest $request, Package $package)
    {
        $package->update($request->validated());

        return new PackageResource($package);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Package $package)
    {
        $package->delete();

        return response()->noContent();
    }
}
