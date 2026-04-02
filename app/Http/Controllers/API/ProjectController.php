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
        $project = Project::updateOrCreate(['id' => $id], $request->validated());
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
        $project->update($request->validated());
        return $this->successResponse(new ProjectResource($project), 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return $this->successResponse(null, 'Project deleted successfully');
    }
}
