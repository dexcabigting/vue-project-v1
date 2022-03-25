<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => ['max:100'],
            'author' => ['max:100'],
            'category' => ['max:100'],
            'description' => ['max:100'],
            'publishing_house' => ['max:100'],
            'publishing_date' => ['date']
        ];
    }
}
