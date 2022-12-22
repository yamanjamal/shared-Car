<?php

namespace App\Http\QueryPipelines\VehiclePipeline;

use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Database\Eloquent\Builder;
use App\Http\QueryPipelines\VehiclePipeline\Filters\SortByTo;
use App\Http\QueryPipelines\VehiclePipeline\Filters\FilterByTo;
use App\Http\QueryPipelines\VehiclePipeline\Filters\SearchFilter;

class VehiclePipeline extends Pipeline
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
            new FilterByTo(request: $this->request),
            new SortByTo(request: $this->request),
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
