<?php

namespace App\Services;

use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Events;
use App\Models\User;
use App\Services\Media\MediaService;
use App\Traits\Filterable;
use App\Utilities\Data;
use Bouncer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class EventService
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
     * @param  Event  $eent
     * @return EventResource
     */
    public function get(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * Get resource index from the database
     * @param $query
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index($data)
    {
        $query = Event::query();
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

        return EventResource::collection($query->paginate(10));
    }

    /**
     * Creates resource in the database
     * @param  array  $data
     * @return Builder|\Illuminate\Database\Eloquent\Model|null
     */
    public function create(array $data)
    {
        $data = $this->clean($data);

        $display = Data::take($data, 'display');

        $record = Event::query()->create($data);
        if (!empty($record)) {
            // Set avatar
            if (!empty($display)) {
                $filename = $this->mediaService->storeDisplay($display, 'public', 'event');
                if (!empty($filename)) {
                    $record->update(['display' => $filename]);
                }
            }
            return $record->fresh();
        } else {
            return null;
        }
    }

    /**
     * Updates resource in the database
     * @param  Event|Model  $event
     * @param  array  $data
     * @return bool
     */
    public function update(Event $event, array $data)
    {
        $data = $this->clean($data);


        if (isset($data['display']) && $data['display']) {
            $filename = $this->mediaService->storeDisplay($data['display'], 'public', 'event');
            if ($filename) {
                $data['display'] = $filename;
            }
            unset($data['avatar']);
        }
        return $event->update($data);
    }



    /**
     * Deletes resource in the database
     * @param  User|Model  $user
     * @return bool
     */
    public function delete(Event $event)
    {
        return $event->delete();
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
