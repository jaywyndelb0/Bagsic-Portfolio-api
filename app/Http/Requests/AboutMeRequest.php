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
            'about_me' => 'required|string',
            'future_goals' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
        ];
    }
}
