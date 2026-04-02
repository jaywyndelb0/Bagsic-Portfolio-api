<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutMeRequest extends FormRequest
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
        return [
            'introduction' => 'required|string',
            'career_goal' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
        ];
    }
}
