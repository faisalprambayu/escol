<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoStoreRequest;
use App\Http\Requests\VideoUpdateRequest;
use App\Http\Resources\VideoCollection;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class VideoController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\VideoCollection
     */
    public function index(Request $request)
    {
        $videos = Video::orderBy('updated_at', 'DESC')->get();

        return new VideoCollection($videos);
    }

    /**
     * @param \App\Http\Requests\VideoStoreRequest $request
     * @return \App\Http\Resources\VideoResource
     */
    public function store(Request $request)
    {
         // dd(time());
         $validator = Validator::make($request->all(), [
            'Title' => ['required'],
            'Link' => ['required'],
            'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $video = $request->all();
            // dd($event);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/video', $name);
                // $path = $file->store('public/files');
                // $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Video([
                    'Title' => $request->get('Title'),
                    'Link' => $request->get('Link'),
                    'Image' => $name,
                ]);
                $save->save();
            }

            return redirect('video');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Video $video
     * @return \App\Http\Resources\VideoResource
     */
    public function show(Request $request, Video $video)
    {
        return new VideoResource($video);
    }

    /**
     * @param \App\Http\Requests\VideoUpdateRequest $request
     * @param \App\Models\Video $video
     * @return \App\Http\Resources\VideoResource
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Title' => ['required'],
            'Link' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $video = $request->all();
            // dd($file = $request->file('Image'));

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/video', $name);

                //store your file into directory and db
                Video::where('id', $request->get('id'))->update([
                    'Title' => $request->get('Title'),
                    'Link' => $request->get('Link'),
                    'Image' => $name,
                ]);
            } else {
                Video::where('id', $request->get('id'))->update([
                    'Title' => $request->get('Title'),
                    'Link' => $request->get('Link'),
                ]);
            }
            // $save->save();
            return redirect('video');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Video $video)
    {
        $video->delete();
        return redirect('video');
        // return response()->noContent();
    }
}
