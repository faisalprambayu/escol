<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class PackageViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/package', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // $data = Package::all();
        return view('ad_package', compact('data'));
    }

    // public function update(Request $request)
    // {
    //     // dd(Carbon::now());
    //     // dd($_POST);
    //     // dd($request-/>all());
    //     // $package->update($request->validated());
    //     // return redirect('package');
    //     // return new PackageResource($package);

    //     $validator = Validator::make($request->all(), [
    //         'Name' => ['required'],
    //         'Price' => ['required'],
    //         'Discount' => ['required'],
    //         'Deskripsi' => ['required'],
    //         'Link' => ['required'],
    //         // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
    //     ]);

    //     // if ($validator->fails()) {
    //     //     return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
    //     // }

    //     // try {
    //     $package = $request->all();
    //     // dd($package);

    //     if ($file = $request->file('Image')) {
    //         $path = $file->store('public/files');
    //         $name = $file->getClientOriginalName();

    //         //store your file into directory and db
    //         Package::where('id', $request->get('id'))->update([
    //             'Name' => $request->get('Name'),
    //             'Price' => $request->get('Price'),
    //             'Discount' => $request->get('Discount'),
    //             'Deskripsi' => $request->get('Deskripsi'),
    //             'Link' => $request->get('Link'),
    //             'Image' => $path,
    //         ]);
    //     } else {
    //         Package::where('id', $request->get('id'))->update([
    //             'Name' => $request->get('Name'),
    //             'Price' => $request->get('Price'),
    //             'Discount' => $request->get('Discount'),
    //             'Deskripsi' => $request->get('Deskripsi'),
    //             'Link' => $request->get('Link')
    //         ]);
    //     }
    //     // $save->save();
    //     return redirect('package');
    //     // } catch (QueryException $e) {
    //     //     return response()->json([
    //     //         'message' => 'Failed' . $e->errorInfo
    //     //     ]);
    //     // }
    // }
}
