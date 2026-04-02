<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Skill;
use App\Http\Requests\SkillRequest;
use App\Http\Resources\SkillResource;
use App\Traits\ApiResponse;

class SkillController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $skills = Skill::all();
        return $this->successResponse(SkillResource::collection($skills), 'Skills retrieved successfully');
    }

    public function store(SkillRequest $request)
    {
        $id = $request->input('id');
        $skill = Skill::updateOrCreate(['id' => $id], $request->validated());
        $message = $skill->wasRecentlyCreated ? 'Skill created successfully' : 'Skill updated successfully';
        $status = $skill->wasRecentlyCreated ? 201 : 200;
        return $this->successResponse(new SkillResource($skill), $message, $status);
    }

    public function show(Skill $skill)
    {
        return $this->successResponse(new SkillResource($skill), 'Skill retrieved successfully');
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        return $this->successResponse(new SkillResource($skill), 'Skill updated successfully');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return $this->successResponse(null, 'Skill deleted successfully');
    }
}
