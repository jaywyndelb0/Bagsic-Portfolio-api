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
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'tech_stacks' => TechStack::count(),
            'education' => Education::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    // Example for Profile (since it's an upsert)
    public function profileIndex()
    {
        $profile = Profile::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function profileUpdate(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'location' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('profile', 'public');
        } else {
            unset($validated['profile_image']);
        }

        Profile::updateOrCreate(['id' => 1], $validated);
        return back()->with('success', 'Profile updated successfully.');
    }

    // Skills CRUD
    public function skillsIndex()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    public function skillStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Skill::create($validated);
        return back()->with('success', 'Skill added successfully.');
    }

    public function skillUpdate(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $skill->update($validated);
        return back()->with('success', 'Skill updated successfully.');
    }

    public function skillDelete(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill deleted successfully.');
    }

    // Tech Stack CRUD
    public function techStacksIndex()
    {
        $techStacks = TechStack::all();
        return view('admin.tech-stacks.index', compact('techStacks'));
    }

    public function techStackStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:programming language,framework,database,design tool,code editor,tool,other',
            'proficiency_level' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        TechStack::create($validated);
        return back()->with('success', 'Tech stack added successfully.');
    }

    public function techStackUpdate(Request $request, TechStack $techStack)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:programming language,framework,database,design tool,code editor,tool,other',
            'proficiency_level' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $techStack->update($validated);
        return back()->with('success', 'Tech stack updated successfully.');
    }

    public function techStackDelete(TechStack $techStack)
    {
        $techStack->delete();
        return back()->with('success', 'Tech stack deleted successfully.');
    }

    // Education CRUD
    public function educationIndex()
    {
        $education = Education::all();
        return view('admin.education.index', compact('education'));
    }

    public function educationStore(Request $request)
    {
        $request->merge(['is_current' => $request->has('is_current')]);
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'year_section' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
        ]);

        Education::create($validated);
        return back()->with('success', 'Education record added successfully.');
    }

    public function educationUpdate(Request $request, Education $education)
    {
        $request->merge(['is_current' => $request->has('is_current')]);
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'year_section' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
        ]);

        $education->update($validated);
        return back()->with('success', 'Education record updated successfully.');
    }

    public function educationDelete(Education $education)
    {
        $education->delete();
        return back()->with('success', 'Education record deleted successfully.');
    }

    // Experiences CRUD
    public function experiencesIndex()
    {
        $experiences = Experience::all();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function experienceStore(Request $request)
    {
        $request->merge(['is_current' => $request->has('is_current')]);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'type' => 'required|in:student project,school activity,internship,freelance,personal learning,group project',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'description' => 'required|string',
            'achievements' => 'nullable|string',
        ]);

        Experience::create($validated);
        return back()->with('success', 'Experience record added successfully.');
    }

    public function experienceUpdate(Request $request, Experience $experience)
    {
        $request->merge(['is_current' => $request->has('is_current')]);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'type' => 'required|in:student project,school activity,internship,freelance,personal learning,group project',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'description' => 'required|string',
            'achievements' => 'nullable|string',
        ]);

        $experience->update($validated);
        return back()->with('success', 'Experience record updated successfully.');
    }

    public function experienceDelete(Experience $experience)
    {
        $experience->delete();
        return back()->with('success', 'Experience record deleted successfully.');
    }

    // Projects CRUD with Image Upload
    public function projectsIndex()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function projectStore(Request $request)
    {
        $request->merge(['featured' => $request->has('featured')]);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug',
            'description' => 'required|string',
            'role' => 'nullable|string|max:255',
            'technologies_used' => 'nullable|string|max:255',
            'github_url' => 'nullable|url|max:255',
            'live_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'nullable|string|max:255',
            'featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);
        return back()->with('success', 'Project added successfully.');
    }

    public function projectUpdate(Request $request, Project $project)
    {
        $request->merge(['featured' => $request->has('featured')]);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $project->id,
            'description' => 'required|string',
            'role' => 'nullable|string|max:255',
            'technologies_used' => 'nullable|string|max:255',
            'github_url' => 'nullable|url|max:255',
            'live_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'nullable|string|max:255',
            'featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        } else {
            unset($validated['image']);
        }

        $project->update($validated);
        return back()->with('success', 'Project updated successfully.');
    }

    public function projectDelete(Project $project)
    {
        $project->delete();
        return back()->with('success', 'Project deleted successfully.');
    }

    // About Me
    public function aboutIndex()
    {
        $about = AboutMe::first();
        return view('admin.about.index', compact('about'));
    }

    public function aboutUpdate(Request $request)
    {
        $validated = $request->validate([
            'about_me' => 'required|string',
            'future_goals' => 'required|string',
        ]);

        AboutMe::updateOrCreate(['id' => 1], $validated);
        return back()->with('success', 'About Me updated successfully.');
    }

    // Social Links
    public function socialLinksIndex()
    {
        $socialLinks = SocialLink::all();
        return view('admin.social-links.index', compact('socialLinks'));
    }

    public function socialLinkStore(Request $request)
    {
        $request->merge(['is_active' => $request->has('is_active')]);
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'username' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        SocialLink::create($validated);
        return back()->with('success', 'Social link added successfully.');
    }

    public function socialLinkUpdate(Request $request, SocialLink $socialLink)
    {
        $request->merge(['is_active' => $request->has('is_active')]);
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'username' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $socialLink->update($validated);
        return back()->with('success', 'Social link updated successfully.');
    }

    public function socialLinkDelete(SocialLink $socialLink)
    {
        $socialLink->delete();
        return back()->with('success', 'Social link deleted successfully.');
    }
}
