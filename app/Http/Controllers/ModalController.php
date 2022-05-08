<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModalCollection;
use App\Http\Resources\ModalResource;
use App\Models\Modal;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ModalController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ModalCollection
     */
    public function index(Request $request)
    {
        $modals = Modal::orderBy('updated_at', 'DESC')->get();

        return new ModalCollection($modals);
    }

    /**
     * @param \App\Http\Requests\EventStoreRequest $request
     * @return \App\Http\Resources\EventResource
     */
    public function store(Request $request)
    {
        // dd(time());
        $validator = Validator::make($request->all(), [
            'Title' => ['required'],
            'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $modals = $request->all();
            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/modal', $name);

                //store your file into directory and db
                $save = new Modal([
                    'Title' => $request->get('Title'),
                    'Image' => $name,
                ]);
                // dd($save);
                $save->save();
            }

                return redirect('modal');
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
    public function show(Request $request, Modal $modal)
    {
        return new ModalResource($modal);
    }

    /**
     * @param \App\Http\Requests\EventUpdateRequest $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
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
            $modal = $request->all();

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/modal', $name);

                //store your file into directory and db
                Modal::where('id', $request->get('id'))->update([
                    'Title' => $request->get('Title'),
                    'Image' => $name,
                ]);
            } else {
                // dd("masuk");
                Modal::where('id', $request->get('id'))->update([
                    'Title' => $request->get('Title'),
                ]);
            }

            return redirect('modal');
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
    public function destroy(Request $request, Modal $modal)
    {
        $modal->delete();
        return redirect('modal');

    }
}
