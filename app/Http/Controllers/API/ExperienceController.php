<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Experience;
use App\Http\Requests\ExperienceRequest;
use App\Http\Resources\ExperienceResource;
use App\Traits\ApiResponse;

class ExperienceController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $experiences = Experience::all();
        return $this->successResponse(ExperienceResource::collection($experiences), 'Experiences retrieved successfully');
    }

    public function store(ExperienceRequest $request)
    {
        $id = $request->input('id');
        $experience = Experience::updateOrCreate(['id' => $id], $request->validated());
        $message = $experience->wasRecentlyCreated ? 'Experience record created successfully' : 'Experience record updated successfully';
        $status = $experience->wasRecentlyCreated ? 201 : 200;
        return $this->successResponse(new ExperienceResource($experience), $message, $status);
    }

    public function show(Experience $experience)
    {
        return $this->successResponse(new ExperienceResource($experience), 'Experience retrieved successfully');
    }

    public function update(ExperienceRequest $request, Experience $experience)
    {
        $experience->update($request->validated());
        return $this->successResponse(new ExperienceResource($experience), 'Experience updated successfully');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return $this->successResponse(null, 'Experience deleted successfully');
    }
}
