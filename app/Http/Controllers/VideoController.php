<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoStoreRequest;
use App\Http\Requests\VideoUpdateRequest;
use App\Http\Resources\VideoCollection;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\Request;

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
    public function store(VideoStoreRequest $request)
    {
        $video = Video::create($request->validated());
        return redirect('video');
        // return new VideoResource($video);
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
    public function update(VideoUpdateRequest $request, Video $video)
    {
        $video->update($request->validated());

        return new VideoResource($video);
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
