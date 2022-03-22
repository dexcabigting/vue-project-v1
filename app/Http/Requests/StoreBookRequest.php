<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'title' => ['required', 'max:100'],
            'author' => ['required', 'max:100'],
            'category' => ['required', 'max:100'],
            'description' => ['required', 'max:100'],
            'publishing_house' => ['required', 'max:100'],
            'publishing_date' => ['required', 'date']
        ];
    }
}
