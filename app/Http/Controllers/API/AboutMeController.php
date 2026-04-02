<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AboutMe;
use App\Http\Requests\AboutMeRequest;
use App\Http\Resources\AboutMeResource;
use App\Traits\ApiResponse;

class AboutMeController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $aboutMe = AboutMe::first();
        if (!$aboutMe) {
            return $this->errorResponse('About me data not found', 404);
        }
        return $this->successResponse(new AboutMeResource($aboutMe), 'About me retrieved successfully');
    }

    public function store(AboutMeRequest $request)
    {
        $aboutMe = AboutMe::updateOrCreate(['id' => 1], $request->validated());
        
        $message = $aboutMe->wasRecentlyCreated ? 'About me created successfully' : 'About me updated successfully';
        $code = $aboutMe->wasRecentlyCreated ? 201 : 200;

        return $this->successResponse(new AboutMeResource($aboutMe), $message, $code);
    }

    public function show(AboutMe $aboutMe)
    {
        return $this->successResponse(new AboutMeResource($aboutMe), 'About me retrieved successfully');
    }

    public function update(AboutMeRequest $request, AboutMe $aboutMe)
    {
        $aboutMe->update($request->validated());
        return $this->successResponse(new AboutMeResource($aboutMe), 'About me updated successfully');
    }

    public function destroy(AboutMe $aboutMe)
    {
        $aboutMe->delete();
        return $this->successResponse(null, 'About me deleted successfully');
    }
}
