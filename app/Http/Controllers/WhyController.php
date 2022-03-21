<?php

namespace App\Http\Controllers;

use App\Http\Resources\WhyCollection;
use App\Http\Resources\WhyResource;
use App\Models\Why;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class WhyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\WhyCollection
     */
    public function index(Request $request)
    {
        if ($request->path() == "essclusive/why" || $request->path() == "essclusive") {
            $whys = Why::where('filter_page',2)->orderBy('created_at', 'ASC')->get();
        }else if($request->path() == "esspecial/why" || $request->path() == "esspecial"){
            $whys = Why::where('filter_page',3)->orderBy('created_at', 'ASC')->get();
        }else if($request->path() == "esstream/why" || $request->path() == "esstream"){
            $whys = Why::where('filter_page',4)->orderBy('created_at', 'ASC')->get();
        }else{
            $whys = Why::where('filter_page',1)->orderBy('created_at', 'ASC')->get();
        }

        return new WhyCollection($whys);
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
            'Icon' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $whys = $request->all();
            // dd($request);

            $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);
            // dd($referer);
            if ($referer == "/essclusive/why") {
                $filter_page = 2;
            }else if($referer == "/esspecial/why"){
                $filter_page = 3;
            }else if($referer == "/esstream/why"){
                $filter_page = 4;
            }else{
                $filter_page = 1;
            }

            $save = new Why([
                'Name' => $request->get('Name'),
                'Description' => $request->get('Description'),
                'Icon' => $request->get('Icon'),
                'Filter_page' => $filter_page,
            ]);
            // dd($request);
            $save->save();

            if ($referer == "/essclusive/why") {
                return redirect('essclusive/why');
            }else if($referer == "/esspecial/why"){
                return redirect('esspecial/why');
            }else if($referer == "/esstream/why"){
                return redirect('esstream/why');
            }else{
                return redirect('why');
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
    public function show(Request $request, Why $why)
    {
        return new WhyResource($why);
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
            'Icon' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $why = $request->all();

            Why::where('id', $request->get('id'))->update([
                'Name' => $request->get('Name'),
                'Description' => $request->get('Description'),
                'Icon' => $request->get('Icon'),
            ]);
            $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);

            if ($referer == "/essclusive/why") {
                return redirect('essclusive/why');
            }else if($referer == "/esspecial/why"){
                return redirect('esspecial/why');
            }else if($referer == "/esstream/why"){
                return redirect('esstream/why');
            }else{
                return redirect('why');
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
    public function destroy(Request $request, Why $why)
    {
        $why->delete();

        $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);

        if ($referer == "/essclusive/why") {
            return redirect('essclusive/why');
        }else if($referer == "/esspecial/why"){
            return redirect('esspecial/why');
        }else if($referer == "/esstream/why"){
            return redirect('esstream/why');
        }else{
            return redirect('why');
        }

    }
}
