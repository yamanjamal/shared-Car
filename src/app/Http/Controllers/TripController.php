<?php

namespace App\Http\Controllers;

use App\Http\QueryPipelines\TripPipeline\TripPipeline;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Http\Resources\TripResource;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TripController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Trip::class, 'trip');
    }

    public function index(Request $request)
    {
        $trip = TripPipeline::make(
            builder: Trip::query(),
            request: $request,
        )->paginate($request->get('limit', 10));

        return TripResource::collection($trip);
    }

    public function store(StoreTripRequest $request)
    {
        $trip = Trip::create($request->validated());
        return response()->json(new TripResource($trip),201);
    }

    public function show(Trip $trip):TripResource
    {
        return new TripResource(resource: $trip);
    }

    public function update(UpdateTripRequest $request, Trip $trip): TripResource
    {
        $trip->update($request->validated());
        return new TripResource(resource: $trip);
    }

    public function destroy(Trip $trip): Response
    {
        $trip->delete();
        return response()->noContent();
    }
}
