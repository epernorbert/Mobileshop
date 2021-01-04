<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadMobile extends FormRequest
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
            'brand' => 'required|max:20|alpha_num',
            'type' => 'required|max:20|alpha_num',
            'color' => 'required|max:20|alpha',
            'weight' => 'required|max:300|numeric',
            'screen_size' => 'required|max:8|numeric'
        ];
    }
}
