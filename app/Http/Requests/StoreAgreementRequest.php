<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgreementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => [
                'required',
                'string',
                'max:100',
            ],
            'sign_date' => [
                'required',
                'date',
            ],
            'is_adult' => [
                'required',
                'boolean',
            ],
            'agree_to_covid_recommendations' => [
                'required',
                'boolean',
                'accepted',
            ],
            'data_is_valid' => [
                'required',
                'boolean',
                'accepted',
            ],
            'agree_to_free_process_image' => [
                'required',
                'boolean',
            ],
        ];
    }
}
