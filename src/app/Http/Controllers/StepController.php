<?php

namespace App\Http\Controllers;

use App\Http\QueryPipelines\StepPipeline\StepPipeline;
use App\Http\Requests\StoreStepRequest;
use App\Http\Requests\UpdateStepRequest;
use App\Http\Resources\StepResource;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StepController extends Controller
{
    public function index(Request $request): StepResource
    {
        $steps = Step::paginate($request->get('page', 10));

        return StepResource::collection($steps);
    }

    public function store(StoreStepRequest $request)
    {
        $step = Step::create($request->validated());
        return response()->json(new StepResource($step),201);
    }

    public function show(Step $step): StepResource
    {
        return new StepResource(resource: $step);
    }

    public function update(UpdateStepRequest $request, Step $step): StepResource
    {
        $step->update($request->validated());
        return new StepResource(resource: $step);
    }

    public function destroy(Step $step): Response
    {
        $step->delete();
        return response()->noContent();
    }
}
