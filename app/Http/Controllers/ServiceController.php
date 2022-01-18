<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Http\Resources\ServiceCollection;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ServiceCollection
     */
    public function index(Request $request)
    {
        $services = Service::orderBy('updated_at', 'DESC')->get();

        return new ServiceCollection($services);
    }

    /**
     * @param \App\Http\Requests\ServiceStoreRequest $request
     * @return \App\Http\Resources\ServiceResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Title' => ['required'],
            'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $service = $request->all();
            // dd($service);

            if ($file = $request->file('Image')) {
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Service([
                    'Title' => $request->get('Title'),
                    'Image' => $path
                ]);
                $save->save();
            }
            return redirect('service');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \App\Http\Resources\ServiceResource
     */
    public function show(Request $request, Service $service)
    {
        return new ServiceResource($service);
    }

    /**
     * @param \App\Http\Requests\ServiceUpdateRequest $request
     * @param \App\Models\Service $service
     * @return \App\Http\Resources\ServiceResource
     */
    // public function update(ServiceUpdateRequest $request, Service $service)
    // {
    //     $service->update($request->validated());

    //     return new ServiceResource($service);
    // }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Title' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $package = $request->all();
            // dd($package);

            if ($file = $request->file('Image')) {
                // dd($package);
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();

                //store your file into directory and db
                Service::where('id', $request->get('id'))->update([
                    'Title' => $request->get('Title'),
                    'Image' => $path,
                ]);
            } else {
                // dd($package);
                Service::where('id', $request->get('id'))->update([
                    'Title' => $request->get('Title'),
                ]);
            }
            return redirect('service');
        } catch (QueryException $e) {
            // dd($e->errorInfo);
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Service $service)
    {
        $service->delete();
        return redirect('service');
        // return response()->noContent();
    }
}
