<?php

namespace App\Services;

use App\Http\Resources\GalleryResource;
use App\Models\Gallery;
use App\Models\Sermon;
use App\Models\User;
use App\Services\Media\MediaService;
use App\Traits\Filterable;
use App\Utilities\Data;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class GalleryService
{

    /**
     * The service instance
     * @var MediaService
     */
    protected $mediaService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mediaService = new MediaService();
    }

    /**
     * Get a single resource from the database
     * @param  Gallery  $gallery
     * @return GalleryResource
     */
    public function get(Gallery $gallery)
    {
        return new GalleryResource($gallery);
    }

    public function getBySlug($slug)
    {
        $gallery = Gallery::where('slug', $slug)->firstOrFail();
        return new GalleryResource($gallery);
    }


    /**
     * Get resource index from the database
     * @param $query
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index($data)
    {
        $query = Gallery::query();
        if (!empty($data['search'])) {
            $query = $query->search($data['search']);
        }
        if (!empty($data['filters'])) {
            $this->filter($query, $data['filters']);
        }
        if (!empty($data['sort_by']) && !empty($data['sort'])) {
            $query = $query->orderBy($data['sort_by'], $data['sort']);
        }

        //         dd(vsprintf(str_replace('?', '%s', str_replace('?', "'?'", $query->toSql())), $query->getBindings()));

        return GalleryResource::collection($query->paginate(50));
    }

    /**
     * Creates resource in the database
     * @param  array  $data
     * @return Builder|\Illuminate\Database\Eloquent\Model|null
     */
    public function create(array $data)
    {
        $display = Data::take($data, 'display');

        if (!empty($display)) {
            $filename = $this->mediaService->storeDisplay($display, 'public', 'sermon');
            if (!empty($filename)) {
                $record = Gallery::query()->create(['display' => $filename]);
            }
            return $record->fresh();
        } else {
            return null;
        }
    }


    /**
     * Deletes resource in the database
     * @param  Gallery|Model  $gallery
     * @return bool
     */
    public function delete(Gallery $gallery)
    {
        return $gallery->delete();
    }

    /**
     * Clean the data
     * @param  array  $data
     * @return array
     */
    private function clean(array $data)
    {
        foreach ($data as $i => $row) {
            if ('null' === $row) {
                $data[$i] = null;
            }
        }
        return $data;
    }

    /**
     * Filter resources
     * @return void
     */
    private function filter(Builder &$query, $filters)
    {
        $query->filter(Arr::except($filters, ['role']));

        if (!empty($filters['role'])) {
            $roleFilter = Filterable::parseFilter($filters['role']);
            if (!empty($roleFilter)) {
                if (is_array($roleFilter[2])) {
                    $query->whereIs(...$roleFilter[2]);
                } else {
                    $query->whereIs($roleFilter[2]);
                }
            }
        }
    }
}
