<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isPost = $this->isMethod('post');
        $projectId = $this->input('id') ?? ($this->project ? $this->project->id : null);
        
        return [
            'id' => 'nullable|integer|exists:projects,id',
            'name' => ($isPost ? 'required|' : 'sometimes|required|') . 'string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . ($projectId ?? 'NULL'),
            'description' => ($isPost ? 'required|' : 'sometimes|required|') . 'string',
            'role' => 'nullable|string|max:255',
            'technologies_used' => 'nullable|string|max:255',
            'github_url' => 'nullable|url|max:255',
            'live_url' => 'nullable|url|max:255',
            'image' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'featured' => 'boolean',
        ];
    }
}
