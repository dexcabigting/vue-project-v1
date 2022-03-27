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
            'title' => ['string', 'min:5', 'max:100'],
            'author' => ['string', 'min:5', 'max:100'],
            'category' => ['string', 'min:5', 'max:100'],
            'description' => ['string', 'min:5', 'max:100'],
            'publishing_house' => ['string', 'min:5', 'max:100'],
            'publishing_date' => ['date']
        ];
    }
}
