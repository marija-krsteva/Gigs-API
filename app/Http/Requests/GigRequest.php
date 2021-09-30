<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GigRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'string|required',
            'description' => 'string|required',
            'dt_start' => 'date|required|after_or_equal:today',
            'dt_end' => 'date|after_or_equal:dt_start|required',
            'positions' => 'integer|numeric|required',
            'pay_per_hour' => 'numeric|required',
            'status' => 'boolean|required',
            'company_id' => 'required|exists:companies,id'
        ];
    }
}
