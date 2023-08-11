<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * The service instance
     * @var blogService
     */
    private BlogService $blogService;

    /**
     * Constructor
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('list', Blog::class);

        return $this->blogService->index($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Blog::class);

        $data = $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'audio' => 'required|mimes:mp3,mp4a|max:20480' //20MB
        ]);

        $record = $this->blogService->create($request->all());
        if (!is_null($record)) {
            return $this->responseStoreSuccess(['record' => $record]);
        } else {
            return $this->responseStoreFail();
        }
    }

    /**
     * Display the specified resource.
     */
    public function edit(Blog $blog)
    {
        $this->authorize('edit', Blog::class);

        $model = $this->blogService->get($blog);
        return $this->responseDataSuccess(['model' => $model]);
    }


    public function show($slug)
    {
        $model = $this->blogService->getBySlug($slug);
        return $this->responseDataSuccess(['model' => $model]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $this->authorize('edit', Blog::class);
        $data = $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            // 'display' => ['image', 'sometimes']
        ]);


        if ($this->blogService->update($blog, $data)) {
            return $this->responseUpdateSuccess(['record' => $blog->fresh()]);
        } else {
            return $this->responseUpdateFail();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('delete', Blog::class);

        if ($this->blogService->delete($blog)) {
            return $this->responseDeleteSuccess(['record' => $blog]);
        }

        return $this->responseDeleteFail();
    }

    public function getAll(Request $request)
    {
        return $this->blogService->index($request->all());
    }
}
