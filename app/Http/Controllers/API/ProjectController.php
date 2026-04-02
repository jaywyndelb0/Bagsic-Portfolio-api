<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Traits\ApiResponse;

class ProjectController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $projects = Project::all();
        return $this->successResponse(ProjectResource::collection($projects), 'Projects retrieved successfully');
    }

    public function store(ProjectRequest $request)
    {
        $id = $request->input('id');
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        } else {
            unset($validated['image']);
        }

        if ($request->has('featured')) {
            $validated['featured'] = $request->boolean('featured');
        }

        $project = Project::updateOrCreate(['id' => $id], $validated);
        $message = $project->wasRecentlyCreated ? 'Project created successfully' : 'Project updated successfully';
        $status = $project->wasRecentlyCreated ? 201 : 200;
        return $this->successResponse(new ProjectResource($project), $message, $status);
    }

    public function show(Project $project)
    {
        return $this->successResponse(new ProjectResource($project), 'Project retrieved successfully');
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        } else {
            unset($validated['image']);
        }

        if ($request->has('featured')) {
            $validated['featured'] = $request->boolean('featured');
        }

        $project->update($validated);
        return $this->successResponse(new ProjectResource($project), 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return $this->successResponse(null, 'Project deleted successfully');
    }
}
