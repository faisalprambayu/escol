<?php

namespace App\Http\Controllers;

use App\Http\Resources\BannerCollection;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
        // dd($request->path());
        if ($request->path() == "essclusive/banner" || $request->path() == "essclusive") {
            $banners = Banner::where('filter_page',2)->orderBy('updated_at', 'DESC')->get();
        }else if($request->path() == "esspecial/banner" || $request->path() == "esspecial"){
            $banners = Banner::where('filter_page',3)->orderBy('updated_at', 'DESC')->get();
        }else if($request->path() == "esstream/banner" || $request->path() == "esstream"){
            $banners = Banner::where('filter_page',4)->orderBy('updated_at', 'DESC')->get();
        }else{
            $banners = Banner::where('filter_page',1)->orderBy('updated_at', 'DESC')->get();
        }

        // dd($banners);
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
            //beda banner tiap page
            $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);
            if ($referer == "/essclusive/banner") {
                $filter_page = 2;
            }else if($referer == "/esspecial/banner"){
                $filter_page = 3;
            }else if($referer == "/esstream/banner"){
                $filter_page = 4;
            }else{
                $filter_page = 1;
            }


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
                'Filter_page' => $filter_page,
            ]);
            // dd($save);
            $save->save();

            if ($referer == "/essclusive/banner") {
                return redirect('essclusive/banner');
            }else if($referer == "/esspecial/banner"){
                return redirect('esspecial/banner');
            }else if($referer == "/esstream/banner"){
                return redirect('esstream/banner');
            }else{
                return redirect('banner');
            }
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
            $origin = $request->server()["HTTP_ORIGIN"];
            $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);
            $origin_referer = $origin . $referer;
            // dd($referer);
            // dd($request->server()["HTTP_ORIGIN"]);
            // dd($request->server()['HTTP_REFERER']);
            //beda banner tiap page
            // dd($request->url());

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
            if ($referer == "/essclusive/banner") {
                return redirect('essclusive/banner');
            }else if($referer == "/esspecial/banner"){
                return redirect('esspecial/banner');
            }else if($referer == "/esstream/banner"){
                return redirect('esstream/banner');
            }else{
                return redirect('banner');
            }

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

        $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);

        if ($referer == "/essclusive/banner") {
            return redirect('essclusive/banner');
        }else if($referer == "/esspecial/banner"){
            return redirect('esspecial/banner');
        }else if($referer == "/esstream/banner"){
            return redirect('esstream/banner');
        }else{
            return redirect('banner');
        }

        // return response()->noContent();
    }
}
