<?php

namespace App\Http\QueryPipelines\TripPipeline;

use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Database\Eloquent\Builder;
use App\Http\QueryPipelines\TripPipeline\Filters\SortByTo;
use App\Http\QueryPipelines\TripPipeline\Filters\SortByFrom;
use App\Http\QueryPipelines\TripPipeline\Filters\SortByStatus;
use App\Http\QueryPipelines\TripPipeline\Filters\FilterByTo;
use App\Http\QueryPipelines\TripPipeline\Filters\FilterByFrom;
use App\Http\QueryPipelines\TripPipeline\Filters\FilterByStatus;
use App\Http\QueryPipelines\TripPipeline\Filters\SearchFilter;

class TripPipeline extends Pipeline
{
    protected ?Request $request;

    public function setRequest(Request $request): static
    {
        $this->request = $request;
        return $this;
    }

    protected function pipes(): array
    {
        return [
//            new SearchFilter(request: $this->request),
            new FilterByFrom(request: $this->request),
            new FilterByTo(request: $this->request),
            new FilterByStatus(request: $this->request),
            new SortByFrom(request: $this->request),
            new SortByTo(request: $this->request),
            new SortByStatus(request: $this->request),
        ];
    }

    public static function make(Builder $builder, Request $request): Builder
    {
        return app(static::class)
            ->setRequest(request: $request)
            ->send($builder)
            ->thenReturn();
    }
}
