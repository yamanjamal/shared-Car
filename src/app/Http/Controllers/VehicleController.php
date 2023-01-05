<?php

namespace App\Http\Controllers;

use App\Http\QueryPipelines\VehiclePipeline\VehiclePipeline;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Vehicle::class, 'vehicle');
    }

    public function index(Request $request)
    {
        $trip = VehiclePipeline::make(
            builder: Vehicle::query(),
            request: $request,
        )->paginate($request->get('limit', 10));

        return VehicleResource::collection($trip);
    }

    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->validated());
        return response()->json(new VehicleResource($vehicle),201);
    }

    public function show(Vehicle $vehicle):VehicleResource
    {
        return new VehicleResource(resource: $vehicle);
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle):VehicleResource
    {
        $vehicle->update($request->validated());
        return new VehicleResource(resource: $vehicle);
    }

    public function destroy(Vehicle $vehicle): Response
    {
        $vehicle->delete();
        return response()->noContent();
    }
}
