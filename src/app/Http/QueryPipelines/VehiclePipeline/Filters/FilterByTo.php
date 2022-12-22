<?php

namespace App\Http\QueryPipelines\VehiclePipeline\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilterByTo
{
    public function __construct(protected Request $request)
    {
    }

    public function handle(Builder $builder, Closure $next)
    {
        $filterTerm = $this->request->get('to', null);

        if (!$filterTerm) {
            return $next($builder);
        }

        $builder->where('to', $filterTerm);

        return $next($builder);
    }
}
