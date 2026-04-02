<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechStackRequest extends FormRequest
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
            'id' => 'nullable|integer|exists:tech_stacks,id',
            'name' => ($isPost ? 'required|' : 'sometimes|required|') . 'string|max:255',
            'category' => ($isPost ? 'required|' : 'sometimes|required|') . 'in:programming language,framework,database,design tool,code editor,tool,other',
            'proficiency_level' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
