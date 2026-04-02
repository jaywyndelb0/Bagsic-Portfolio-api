<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'id' => 'nullable|integer|exists:education,id',
            'school_name' => ($isPost ? 'required|' : 'sometimes|required|') . 'string|max:255',
            'degree' => ($isPost ? 'required|' : 'sometimes|required|') . 'string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'year_section' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
        ];
    }
}
