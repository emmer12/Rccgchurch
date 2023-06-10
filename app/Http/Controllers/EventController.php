<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    /**
     * The service instance
     * @var EventService
     */
    private EventService $eventService;

    /**
     * Constructor
     */
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('list', Event::class);

        return $this->eventService->index($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Event::class);


        $input = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string'],
            'datetime' => ['required', 'string'],
            'display' => ['image', 'sometimes']
        ]);


        $record = $this->eventService->create($input);
        if (!is_null($record)) {
            return $this->responseStoreSuccess(['record' => $record]);
        } else {
            return $this->responseStoreFail();
        }
    }

    /**
     * Display the specified resource.
     */
    public function edit(Event $event)
    {
        $this->authorize('edit', Event::class);

        $model = $this->eventService->get($event);
        return $this->responseDataSuccess(['model' => $model]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $this->authorize('edit', Event::class);
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string'],
            'datetime' => ['required', 'string'],
            // 'display' => ['image', 'sometimes']
        ]);


        if ($this->eventService->update($event, $data)) {
            return $this->responseUpdateSuccess(['record' => $event->fresh()]);
        } else {
            return $this->responseUpdateFail();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $this->authorize('delete', Event::class);

        if ($this->eventService->delete($event)) {
            return $this->responseDeleteSuccess(['record' => $event]);
        }

        return $this->responseDeleteFail();
    }
}
