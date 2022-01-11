<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\EventCollection
     */
    public function index(Request $request)
    {
        $events = Event::all();

        return new EventCollection($events);
    }

    /**
     * @param \App\Http\Requests\EventStoreRequest $request
     * @return \App\Http\Resources\EventResource
     */
    public function store(EventStoreRequest $request)
    {
        $event = Event::create($request->validated());

        return new EventResource($event);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
    public function show(Request $request, Event $event)
    {
        return new EventResource($event);
    }

    /**
     * @param \App\Http\Requests\EventUpdateRequest $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        $event->update($request->validated());

        return new EventResource($event);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event)
    {
        $event->delete();

        return response()->noContent();
    }
}
