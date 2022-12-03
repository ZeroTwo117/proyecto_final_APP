<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaRequest extends FormRequest
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
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'id_tabla' => 'required',
            'foto' => 'required|mimes: jpg,jpeg,png',
            'foto2' => 'required|mimes: jpg,jpeg,png',
            'foto3' => 'required|mimes: jpg,jpeg,png',
            'foto4' => 'required|mimes: jpg,jpeg,png',
        ];
    }
}
