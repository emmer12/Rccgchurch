<?php

namespace App\Http\Controllers;

use App\Services\GalleryService;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    /**
     * The service instance
     * @var GalleryService
     */
    private GalleryService $galleryService;

    /**
     * Constructor
     */
    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('list', Gallery::class);

        return $this->galleryService->index($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Gallery::class);


        $record = $this->galleryService->create($request->all());
        if (!is_null($record)) {
            return $this->responseStoreSuccess(['record' => $record]);
        } else {
            return $this->responseStoreFail();
        }
    }

    /**
     * Display the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $this->authorize('edit', Gallery::class);

        $model = $this->galleryService->get($gallery);
        return $this->responseDataSuccess(['model' => $model]);
    }


    public function show($slug)
    {
        $model = $this->galleryService->getBySlug($slug);
        return $this->responseDataSuccess(['model' => $model]);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $this->authorize('delete', Gallery::class);

        if ($this->galleryService->delete($gallery)) {
            return $this->responseDeleteSuccess(['record' => $gallery]);
        }

        return $this->responseDeleteFail();
    }

    public function getAll(Request $request)
    {
        return $this->galleryService->index($request->all());
    }
}
