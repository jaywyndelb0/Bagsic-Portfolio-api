<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SocialLink;
use App\Http\Requests\SocialLinkRequest;
use App\Http\Resources\SocialLinkResource;
use App\Traits\ApiResponse;

class SocialLinkController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $socialLinks = SocialLink::all();
        return $this->successResponse(SocialLinkResource::collection($socialLinks), 'Social links retrieved successfully');
    }

    public function store(SocialLinkRequest $request)
    {
        $id = $request->input('id');
        $socialLink = SocialLink::updateOrCreate(['id' => $id], $request->validated());
        $message = $socialLink->wasRecentlyCreated ? 'Social link created successfully' : 'Social link updated successfully';
        $status = $socialLink->wasRecentlyCreated ? 201 : 200;
        return $this->successResponse(new SocialLinkResource($socialLink), $message, $status);
    }

    public function show(SocialLink $socialLink)
    {
        return $this->successResponse(new SocialLinkResource($socialLink), 'Social link retrieved successfully');
    }

    public function update(SocialLinkRequest $request, SocialLink $socialLink)
    {
        $socialLink->update($request->validated());
        return $this->successResponse(new SocialLinkResource($socialLink), 'Social link updated successfully');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return $this->successResponse(null, 'Social link deleted successfully');
    }
}
