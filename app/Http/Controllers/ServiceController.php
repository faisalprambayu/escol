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
        if ($request->path() == "essclusive/service" || $request->path() == "essclusive") {
            $services = Service::where('filter_page',2)->orderBy('updated_at', 'DESC')->get();
        }else if($request->path() == "esspecial/service" || $request->path() == "esspecial"){
            $services = Service::where('filter_page',3)->orderBy('updated_at', 'DESC')->get();
        }else if($request->path() == "esstream/service" || $request->path() == "esstream"){
            $services = Service::where('filter_page',4)->orderBy('updated_at', 'DESC')->get();
        }else{
            $services = Service::where('filter_page',1)->orderBy('updated_at', 'DESC')->get();
        }
        // dd($services);

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
            'Icon' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $service = $request->all();
            // dd($service);

            // if ($file = $request->file('Image')) {
            //     $name =  time() . '-' . $file->getClientOriginalName();
            //     $file->move('resource/service', $name);
            //     // $path = $file->store('public/files');

            //     //store your file into directory and db
            //     $save = new Service([
            //         'Title' => $request->get('Title'),
            //         'Image' => $name
            //     ]);
            //     $save->save();
            // }
            $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);
            if ($referer == "/essclusive/service") {
                $filter_page = 2;
            }else if($referer == "/esspecial/service"){
                $filter_page = 3;
            }else if($referer == "/esstream/service"){
                $filter_page = 4;
            }else{
                $filter_page = 1;
            }

            $save = new Service([
                'Title' => $request->get('Title'),
                'Icon' => $request->get('Icon'),
                'Filter_page' => $filter_page,
                'Description' => $request->get('Description'),
            ]);
            $save->save();

            if ($referer == "/essclusive/service") {
                return redirect('essclusive/service');
            }else if($referer == "/esspecial/service"){
                return redirect('esspecial/service');
            }else if($referer == "/esstream/service"){
                return redirect('esstream/service');
            }else{
                return redirect('service');
            }

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
            'Icon' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $package = $request->all();
            $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);
            // dd($package);

            // if ($file = $request->file('Image')) {
            //     // dd($package);
            //     $name =  time() . '-' . $file->getClientOriginalName();
            //     $file->move('resource/service', $name);
            //     // $path = $file->store('public/files');
            //     // $name = $file->getClientOriginalName();

            //     //store your file into directory and db
            //     Service::where('id', $request->get('id'))->update([
            //         'Title' => $request->get('Title'),
            //         'Image' => $name,
            //     ]);
            // } else {
            //     // dd($package);
            //     Service::where('id', $request->get('id'))->update([
            //         'Title' => $request->get('Title'),
            //     ]);
            // }
            Service::where('id', $request->get('id'))->update([
                'Title' => $request->get('Title'),
                'Icon' => $request->get('Icon'),
                'Description' => $request->get('Description'),
            ]);
            if ($referer == "/essclusive/service") {
                return redirect('essclusive/service');
            }else if($referer == "/esspecial/service"){
                return redirect('esspecial/service');
            }else if($referer == "/esstream/service"){
                return redirect('esstream/service');
            }else{
                return redirect('service');
            }

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

        $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);
        if ($referer == "/essclusive/service") {
            return redirect('essclusive/service');
        }else if($referer == "/esspecial/service"){
            return redirect('esspecial/service');
        }else if($referer == "/esstream/service"){
            return redirect('esstream/service');
        }else{
            return redirect('service');
        }

        // return response()->noContent();
    }
}
