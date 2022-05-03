<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NasaNeoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date']
        ];
    }

    public function attributes()
    {
        return [
            'start_date' => 'Start Date',
            'end_date' => 'End Date'
        ];
    }
}
