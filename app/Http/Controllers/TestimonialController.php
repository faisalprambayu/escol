<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestimonialCollection;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TestimonialController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TestimonialCollection
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::orderBy('updated_at', 'DESC')->get();
        // dd($testimonials);
        return new TestimonialCollection($testimonials);
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
            'Title' => ['required'],
            'Testimonial' => ['required'],
            'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $testimonial = $request->all();
            // dd($event);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/testimonial', $name);
                // $path = $file->store('public/files');
                // $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Testimonial([
                    'Name' => $request->get('Name'),
                    'Title' => $request->get('Title'),
                    'Testimonial' => $request->get('Testimonial'),
                    'Image' => $name,
                ]);
                $save->save();
            }

            // $response = [
            //     'message' => 'Event Created',
            //     'data' => $event
            // ];

            // return response()->json($response, Response::HTTP_CREATED);
            return redirect('testimonial');
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
    public function show(Request $request, Testimonial $testimonial)
    {
        return new TestimonialResource($testimonial);
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
            'Title' => ['required'],
            'Testimonial' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $testimonial = $request->all();
            // dd($package);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/testimonial', $name);

                //store your file into directory and db
                Testimonial::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Title' => $request->get('Title'),
                    'Testimonial' => $request->get('Testimonial'),
                    'Image' => $name,
                ]);
            } else {
                Testimonial::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Title' => $request->get('Title'),
                    'Testimonial' => $request->get('Testimonial'),
                ]);
            }
            // $save->save();
            return redirect('event');
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
    public function destroy(Request $request, Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect('testimonia$testimonial');
        // return response()->noContent();
    }
}
