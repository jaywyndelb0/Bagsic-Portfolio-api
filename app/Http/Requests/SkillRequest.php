<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'id' => 'nullable|integer|exists:skills,id',
            'name' => ($isPost ? 'required|' : 'sometimes|required|') . 'string|max:255',
            'level' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
