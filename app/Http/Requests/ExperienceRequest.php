<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
        return [
            'id' => 'nullable|integer|exists:experiences,id',
            'title' => ($isPost ? 'required|' : 'sometimes|required|') . 'string|max:255',
            'organization' => 'nullable|string|max:255',
            'type' => ($isPost ? 'required|' : 'sometimes|required|') . 'in:student project,school activity,internship,freelance,personal learning,group project',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'description' => ($isPost ? 'required|' : 'sometimes|required|') . 'string',
            'achievements' => 'nullable|string',
        ];
    }
}
