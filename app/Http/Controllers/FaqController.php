<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqStoreRequest;
use App\Http\Requests\FaqUpdateRequest;
use App\Http\Resources\FaqCollection;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class FaqController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\FaqCollection
     */
    public function index(Request $request)
    {
        $faqs = Faq::orderBy('updated_at', 'DESC')->get();

        return new FaqCollection($faqs);
    }

    /**
     * @param \App\Http\Requests\FaqStoreRequest $request
     * @return \App\Http\Resources\FaqResource
     */
    public function store(FaqStoreRequest $request)
    {
        $faq = Faq::create($request->validated());
        return redirect('faq');
        // return new FaqResource($faq);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \App\Http\Resources\FaqResource
     */
    public function show(Request $request, Faq $faq)
    {
        return new FaqResource($faq);
    }

    /**
     * @param \App\Http\Requests\FaqUpdateRequest $request
     * @param \App\Models\Faq $faq
     * @return \App\Http\Resources\FaqResource
     */
    public function update(Request $request)
    {
        // dd("masuk faqw update");
        $validator = Validator::make($request->all(), [
            'Question' => ['required'],
            'Answer' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $friend = $request->all();

            // dd($request);
            //store your file into directory and db
            Faq::where('id', $request->get('id'))->update([
                'Question' => $request->get('Question'),
                'Answer' => $request->get('Answer'),
            ]);
            // $save->save();
            return redirect('faq');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }

        // return new FaqResource($faq);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faq $faq)
    {
        $faq->delete();
        return redirect('faq');

        // return response()->noContent();
    }
}
