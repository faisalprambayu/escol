<?php

namespace App\Http\Controllers;

use App\Http\Resources\BannerCollection;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BannerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\BannerCollection
     */
    public function index(Request $request)
    {
        $banners = Banner::orderBy('updated_at', 'DESC')->get();
        return new BannerCollection($banners);
    }

    /**
     * @param \App\Http\Requests\EventStoreRequest $request
     * @return \App\Http\Resources\EventResource
     */
    public function store(Request $request)
    {
        // dd(time());
        $validator = Validator::make($request->all(), [
            'Name' => ['required'],
            'Description' => ['required'],
            'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'Background' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $banners = $request->all();
            // dd($banners);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/banner', $name);
            }
            if ($fileb = $request->file('Background')) {
                $nameb = time() . '-' . $fileb->getClientOriginalName();
                $fileb->move('resource/banner', $nameb);
            }

             //store your file into directory and db
             $save = new Banner([
                'Name' => $request->get('Name'),
                'Description' => $request->get('Description'),
                'Image' => $name,
                'Background' => $nameb,
            ]);
            $save->save();
            // dd($save);

            return redirect('banner');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
    public function show(Request $request, Banner $banner)
    {
        return new BannerResource($banner);
    }

    /**
     * @param \App\Http\Requests\EventUpdateRequest $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'Name' => ['required'],
            'Description' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $banner = $request->all();
            // dd($banner);

            if ($fileb = $request->file('Background')) {
                $nameb = time() . '-' . $fileb->getClientOriginalName();
                $fileb->move('resource/banner', $nameb);

                Banner::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Description' => $request->get('Description'),
                    'Background' => $nameb,
                ]);
            }

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/banner', $name);


                //store your file into directory and db
                Banner::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Description' => $request->get('Description'),
                    'Image' => $name,
                ]);
            } else {
                // dd("masuk");
                Banner::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Description' => $request->get('Description'),
                ]);
            }
            // $save->save();
            return redirect('banner');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Banner $banner)
    {
        $banner->delete();
        return redirect('banner');
        // return response()->noContent();
    }
}
