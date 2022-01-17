<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageStoreRequest;
use App\Http\Requests\PackageUpdateRequest;
use App\Http\Resources\PackageCollection;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PackageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\PackageCollection
     */
    public function index(Request $request)
    {
        $packages = Package::orderBy('updated_at', 'DESC')->get();
        $data = new PackageCollection($packages);
        return $data;
    }

    /**
     * @param \App\Http\Requests\PackageStoreRequest $request
     * @return \App\Http\Resources\PackageResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => ['required'],
            'Price' => ['required'],
            'Discount' => ['required'],
            'Deskripsi' => ['required'],
            'Link' => ['required'],
            'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $package = $request->all();
            // dd($package);

            if ($file = $request->file('Image')) {
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Package([
                    'Name' => $request->get('Name'),
                    'Price' => $request->get('Price'),
                    'Discount' => $request->get('Discount'),
                    'Deskripsi' => $request->get('Deskripsi'),
                    'Link' => $request->get('Link'),
                    'Image' => $path
                ]);
                $save->save();
            }

            return redirect('package');

        }
        catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
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
        return redirect('package');
        // return response()->noContent();
    }
}
