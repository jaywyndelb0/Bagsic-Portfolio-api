<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;
use App\Models\AboutMe;
use App\Models\Skill;
use App\Models\TechStack;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\SocialLink;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\AboutMeResource;
use App\Http\Resources\SkillResource;
use App\Http\Resources\TechStackResource;
use App\Http\Resources\EducationResource;
use App\Http\Resources\ExperienceResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\SocialLinkResource;
use App\Traits\ApiResponse;

class PortfolioController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $portfolio = [
            'profile' => new ProfileResource(Profile::first()),
            'about_me' => new AboutMeResource(AboutMe::first()),
            'skills' => SkillResource::collection(Skill::all()),
            'tech_stacks' => TechStackResource::collection(TechStack::all()),
            'education' => EducationResource::collection(Education::all()),
            'experiences' => ExperienceResource::collection(Experience::all()),
            'projects' => ProjectResource::collection(Project::all()),
            'social_links' => SocialLinkResource::collection(SocialLink::all()),
        ];

        return $this->successResponse($portfolio, 'Portfolio data retrieved successfully');
    }
}
