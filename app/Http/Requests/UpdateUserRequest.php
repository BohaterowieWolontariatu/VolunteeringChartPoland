<?php

namespace App\Http\Requests;

use App\Rules\Pesel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:255',
            ],
            'surname' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'max:255',
                'email',
                Rule::unique('users', 'email')->ignore($this->route()->parameter('user')),
            ],
            'pesel' => [
                'required',
                'max:255',
                new Pesel,
            ],
            'phone' => [
                'required',
                'max:255',
            ],
            'is_active' => [
                'required',
                'boolean',
            ],
            'has_agreement_signed' => [
                'required',
                'boolean',
            ],
        ];
    }
}
