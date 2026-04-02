<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialLinkRequest extends FormRequest
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
            'id' => 'nullable|integer|exists:social_links,id',
            'platform' => ($isPost ? 'required|' : 'sometimes|required|') . 'string|max:255',
            'url' => ($isPost ? 'required|' : 'sometimes|required|') . 'url|max:255',
            'username' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ];
    }
}
