<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\AboutMe;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Education;
use App\Models\Experience;
use App\Models\TechStack;
use App\Models\SocialLink;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('home', compact('profile'));
    }

    public function about()
    {
        $about = AboutMe::first();
        $education = Education::orderBy('start_date', 'desc')->get();
        $experience = Experience::orderBy('start_date', 'desc')->get();
        return view('about', compact('about', 'education', 'experience'));
    }

    public function skills()
    {
        $skills = Skill::all();
        $techStacks = TechStack::all()->groupBy('category');
        return view('skills', compact('skills', 'techStacks'));
    }

    public function projects()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('projects', compact('projects'));
    }

    public function contact()
    {
        $profile = Profile::first();
        $socialLinks = SocialLink::all();
        return view('contact', compact('profile', 'socialLinks'));
    }
}
