<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class formValidation extends Request
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
                'idd'=>'required|numeric',
                'idu'=>'required|numeric',
                'nombre' => ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'ap' => ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'am' => ['regex:/^[A-Z][A-Z,a-z, , ñ,á,é,í,ó,ú]+$/'],
                'edad' => 'required|integer',
                'telefono' => ['regex:/^[0-9]{10}$/'], 
                'calle' => 'required',
                'numero' => 'required|integer',
                'calle1' => 'required',
                'calle2' => 'required',
                'colonia' => 'required',
                'municipio' => 'required',
                'ciudad' => 'required',
                'cp' => ['regex:/^[0-9]{5}$/'],
                'referencia' => 'required',
                'archivo'=>'image|mimes:jpeg,png,gif,jpg'
        ];
    }
}
