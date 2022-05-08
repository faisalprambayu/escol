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
        if ($request->path() == "essclusive/package" || $request->path() == "essclusive") {
            $packages = Package::where('filter_page',2)->orderBy('updated_at', 'DESC')->get();
        }else if($request->path() == "esspecial/package" || $request->path() == "esspecial"){
            $packages = Package::where('filter_page',3)->orderBy('updated_at', 'DESC')->get();
        }else if($request->path() == "esstream/package" || $request->path() == "esstream"){
            $packages = Package::where('filter_page',4)->orderBy('updated_at', 'DESC')->get();
        }else{
            $packages = Package::orderBy('updated_at', 'DESC')->get();
        }

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
            $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);
            if ($referer == "/essclusive/package") {
                $filter_page = 2;
            }else if($referer == "/esspecial/package"){
                $filter_page = 3;
            }else if($referer == "/esstream/package"){
                $filter_page = 4;
            }else{
                $filter_page = 1;
            }

            if ($file = $request->file('Image')) {
                $name =  time() . '-' . $file->getClientOriginalName();
                $file->move('resource/package', $name);
                // $path = $file->store('public/files');
                // $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Package([
                    'Name' => $request->get('Name'),
                    'Price' => $request->get('Price'),
                    'Discount' => $request->get('Discount'),
                    'Deskripsi' => $request->get('Deskripsi'),
                    'Link' => $request->get('Link'),
                    'Image' => $name,
                    'Filter_page' => $filter_page
                ]);
                // dd($save);
                $save->save();
            }

            if ($referer == "/essclusive/package") {
                return redirect('essclusive/package');
            }else if($referer == "/esspecial/package"){
                return redirect('esspecial/package');
            }else if($referer == "/esstream/package"){
                return redirect('esstream/package');
            }else{
                return redirect('package');
            }

        } catch (QueryException $e) {
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

    public function update(Request $request)
    {
        // dd(Carbon::now());
        // dd($_POST);
        // dd($request-/>all());
        // $package->update($request->validated());
        // return redirect('package');
        // return new PackageResource($package);

        $validator = Validator::make($request->all(), [
            'Name' => ['required'],
            'Price' => ['required'],
            'Discount' => ['required'],
            'Deskripsi' => ['required'],
            'Link' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $package = $request->all();
            // dd($package);
            $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);

            if ($file = $request->file('Image')) {
                $name =  time() . '-' . $file->getClientOriginalName();
                $file->move('resource/package', $name);
                // $path = $file->store('public/files');
                // $name = $file->getClientOriginalName();

                //store your file into directory and db
                Package::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Price' => $request->get('Price'),
                    'Discount' => $request->get('Discount'),
                    'Deskripsi' => $request->get('Deskripsi'),
                    'Link' => $request->get('Link'),
                    'Image' => $name,
                ]);
            } else {
                Package::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Price' => $request->get('Price'),
                    'Discount' => $request->get('Discount'),
                    'Deskripsi' => $request->get('Deskripsi'),
                    'Link' => $request->get('Link')
                ]);
            }
            // $save->save();
            if ($referer == "/essclusive/package") {
                return redirect('essclusive/package');
            }else if($referer == "/esspecial/package"){
                return redirect('esspecial/package');
            }else if($referer == "/esstream/package"){
                return redirect('esstream/package');
            }else{
                return redirect('package');
            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Package $package)
    {
        $package->delete();

        $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);

        if ($referer == "/essclusive/package") {
            return redirect('essclusive/package');
        }else if($referer == "/esspecial/package"){
            return redirect('esspecial/package');
        }else if($referer == "/esstream/package"){
            return redirect('esstream/package');
        }else{
            return redirect('package');
        }
        // return response()->noContent();
    }
}
