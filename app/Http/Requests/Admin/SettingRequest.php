<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'number'     => ['required', 'numeric'],
                    'facebook'    => ['required'],
                    'linkedin'    => ['required'],
                    'instagram'    => ['required'],
                    'logo' => ['required', 'image'],
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'number'     => ['required', 'numeric'],
                    'facebook'    => ['required'],
                    'linkedin'    => ['required'],
                    'instagram'    => ['required'],
                    'logo' => ['image'],
                ];
            }
            default: break;
        }
    }
}
