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
            'location' => 'nullable',
            'address' => 'required',
            'mz_lote' => 'required',
            'latitud' => 'required',
            'tipo_sector' => 'required',
            'name_presidenta' => 'required',
            'cargo' => 'required',
            'num_beneficiado' => 'required',
            'num_resolucion' => 'required',
            'fecha_emitido' => 'required',
            'fecha_vencimiento' => 'required',
            'longitud' => 'required',
            'phone' => 'required|numeric',
            'description' => 'nullable',
            'uuid' => 'required|uuid',
            'category_id' => 'required|exists:App\Category,id',
            'user_id' => '',
        ];
    }
}
