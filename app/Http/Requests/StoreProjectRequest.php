<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => 'nullable|exists:types,id',
            'title' => 'required|min:10|max:200',
            'technologies' => 'exists:technologies,id',
            'cover_image' => 'nullable|image|max:700',
            'description' => 'nullable|max:300',
            'start_date' => 'nullable|min:4',
            'preview_url' => 'nullable|min:30',
            'url_code' => 'nullable|min:30',
            'team_members' => 'nullable',
        ];
    }
}