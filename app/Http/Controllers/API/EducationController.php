<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Education;
use App\Http\Requests\EducationRequest;
use App\Http\Resources\EducationResource;
use App\Traits\ApiResponse;

class EducationController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $education = Education::all();
        return $this->successResponse(EducationResource::collection($education), 'Education records retrieved successfully');
    }

    public function store(EducationRequest $request)
    {
        $id = $request->input('id');
        $education = Education::updateOrCreate(['id' => $id], $request->validated());
        $message = $education->wasRecentlyCreated ? 'Education record created successfully' : 'Education record updated successfully';
        $status = $education->wasRecentlyCreated ? 201 : 200;
        return $this->successResponse(new EducationResource($education), $message, $status);
    }

    public function show(Education $education)
    {
        return $this->successResponse(new EducationResource($education), 'Education record retrieved successfully');
    }

    public function update(EducationRequest $request, Education $education)
    {
        $education->update($request->validated());
        return $this->successResponse(new EducationResource($education), 'Education record updated successfully');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return $this->successResponse(null, 'Education record deleted successfully');
    }
}
