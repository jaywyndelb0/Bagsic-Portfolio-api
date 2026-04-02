<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TechStack;
use App\Http\Requests\TechStackRequest;
use App\Http\Resources\TechStackResource;
use App\Traits\ApiResponse;

class TechStackController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $techStacks = TechStack::all();
        return $this->successResponse(TechStackResource::collection($techStacks), 'Tech stacks retrieved successfully');
    }

    public function store(TechStackRequest $request)
    {
        $id = $request->input('id');
        $techStack = TechStack::updateOrCreate(['id' => $id], $request->validated());
        $message = $techStack->wasRecentlyCreated ? 'Tech stack created successfully' : 'Tech stack updated successfully';
        $status = $techStack->wasRecentlyCreated ? 201 : 200;
        return $this->successResponse(new TechStackResource($techStack), $message, $status);
    }

    public function show(TechStack $techStack)
    {
        return $this->successResponse(new TechStackResource($techStack), 'Tech stack retrieved successfully');
    }

    public function update(TechStackRequest $request, TechStack $techStack)
    {
        $techStack->update($request->validated());
        return $this->successResponse(new TechStackResource($techStack), 'Tech stack updated successfully');
    }

    public function destroy(TechStack $techStack)
    {
        $techStack->delete();
        return $this->successResponse(null, 'Tech stack deleted successfully');
    }
}
