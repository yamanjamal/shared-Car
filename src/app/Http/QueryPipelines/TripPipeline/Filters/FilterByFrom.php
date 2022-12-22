<?php

namespace App\Http\QueryPipelines\TripPipeline\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilterByFrom
{
    public function __construct(protected Request $request)
    {
    }

    public function handle(Builder $builder, Closure $next)
    {
        $filterTerm = $this->request->get('from', null);

        if (!$filterTerm) {
            return $next($builder);
        }

        $builder->where('from', $filterTerm);

        return $next($builder);
    }
}
