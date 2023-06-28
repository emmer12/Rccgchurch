<?php

namespace App\Http\Controllers;

use App\Services\SermonService;
use App\Models\Sermon;
use Illuminate\Http\Request;

class SermonController extends Controller
{

    /**
     * The service instance
     * @var SermonService
     */
    private SermonService $sermonService;

    /**
     * Constructor
     */
    public function __construct(SermonService $sermonService)
    {
        $this->sermonService = $sermonService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('list', Sermon::class);

        return $this->sermonService->index($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Gallery::class);

        $record = $this->sermonService->create($request->all());
        if (!is_null($record)) {
            return $this->responseStoreSuccess(['record' => $record]);
        } else {
            return $this->responseStoreFail();
        }
    }

    /**
     * Display the specified resource.
     */
    public function edit(Sermon $sermon)
    {
        $this->authorize('edit', Sermon::class);

        $model = $this->sermonService->get($sermon);
        return $this->responseDataSuccess(['model' => $model]);
    }


    public function show($slug)
    {
        $model = $this->sermonService->getBySlug($slug);
        return $this->responseDataSuccess(['model' => $model]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sermon $sermon)
    {
        $this->authorize('edit', Sermon::class);
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'link' => ['required', 'string'],
            // 'display' => ['image', 'sometimes']
        ]);


        if ($this->sermonService->update($sermon, $data)) {
            return $this->responseUpdateSuccess(['record' => $sermon->fresh()]);
        } else {
            return $this->responseUpdateFail();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sermon $sermon)
    {
        $this->authorize('delete', Sermon::class);

        if ($this->sermonService->delete($sermon)) {
            return $this->responseDeleteSuccess(['record' => $sermon]);
        }

        return $this->responseDeleteFail();
    }

    public function getAll(Request $request)
    {
        return $this->sermonService->index($request->all());
    }
}
