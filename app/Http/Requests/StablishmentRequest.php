<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StablishmentRequest extends FormRequest
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
     * @return array |image|max:1000
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'image' => [
                $this->route('stablishment') ? 'nullable' : 'required',
                'mimes:jpeg,png',
            ],
            'location' => '',
            'address' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'phone' => 'required|numeric',
            'description' => 'required',
            'open' => 'date_format:H:i',
            'close' => 'date_format:H:i|after:open',
            'uuid' => 'required|uuid',
            'category_id' => 'required|exists:App\Category,id',
            'user_id' => '',
        ];
    }
}
