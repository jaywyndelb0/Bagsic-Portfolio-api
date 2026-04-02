<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Traits\ApiResponse;

class ProfileController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $profile = Profile::first();
        if (!$profile) {
            return $this->errorResponse('Profile not found', 404);
        }
        return $this->successResponse(new ProfileResource($profile), 'Profile retrieved successfully');
    }

    public function store(ProfileRequest $request)
    {
        $profile = Profile::updateOrCreate(['id' => 1], $request->validated());
        
        $message = $profile->wasRecentlyCreated ? 'Profile created successfully' : 'Profile updated successfully';
        $code = $profile->wasRecentlyCreated ? 201 : 200;

        return $this->successResponse(new ProfileResource($profile), $message, $code);
    }

    public function show(Profile $profile)
    {
        return $this->successResponse(new ProfileResource($profile), 'Profile retrieved successfully');
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        $profile->update($request->validated());
        return $this->successResponse(new ProfileResource($profile), 'Profile updated successfully');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return $this->successResponse(null, 'Profile deleted successfully');
    }
}
