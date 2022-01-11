<?php

namespace App\Http\Controllers;

use App\Http\Requests\FooterStoreRequest;
use App\Http\Requests\FooterUpdateRequest;
use App\Http\Resources\FooterCollection;
use App\Http\Resources\FooterResource;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\FooterCollection
     */
    public function index(Request $request)
    {
        $footers = Footer::all();

        return new FooterCollection($footers);
    }

    /**
     * @param \App\Http\Requests\FooterStoreRequest $request
     * @return \App\Http\Resources\FooterResource
     */
    public function store(FooterStoreRequest $request)
    {
        $footer = Footer::create($request->validated());

        return new FooterResource($footer);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Footer $footer
     * @return \App\Http\Resources\FooterResource
     */
    public function show(Request $request, Footer $footer)
    {
        return new FooterResource($footer);
    }

    /**
     * @param \App\Http\Requests\FooterUpdateRequest $request
     * @param \App\Models\Footer $footer
     * @return \App\Http\Resources\FooterResource
     */
    public function update(FooterUpdateRequest $request, Footer $footer)
    {
        $footer->update($request->validated());

        return new FooterResource($footer);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Footer $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Footer $footer)
    {
        $footer->delete();

        return response()->noContent();
    }
}
