<?php

namespace App\Http\QueryPipelines\TripPipeline\Filters;

use Closure;
use Illuminate\Http\Request;
use App\Builders\TripBuilder;

class SearchFilter
{
    public function __construct(protected Request $request)
    {
    }

    public function handle(TripBuilder $builder, Closure $next)
    {
        $searchTerm = $this->request->get('q', null);

        if (!$searchTerm) {
            return $next($builder);
        }

        $builder->search($searchTerm);

        return $next($builder);
    }
}
