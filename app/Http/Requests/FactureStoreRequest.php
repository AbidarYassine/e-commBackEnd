<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactureStoreRequest extends FormRequest
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
            'datefact' => 'required|date|date_format:Y-m-d|after:yesterday',
            'baseht' => 'required|numeric',
            "tva" => 'required|numeric',
            "remise" => 'required|numeric',
            "totalht" => 'required|numeric',
            "totalttc" => 'required|numeric',
            'command_id' => 'exists:App\Models\Command,id'
        ];
    }

    public function messages()
    {
        return [
            ## required Validation
            'datefact.required' => 'Date Facture is required required',
            'baseht.required' => 'Base Hors Taxe is required',
            'tva.required' => 'TVA is required',
            'remise.required' => 'remise is required',
            'totalht.required' => 'Total Hors Taxe is required',
            'totalttc.required' => 'TTC is required',
            ## number Validation
            'baseht.numeric' => 'Base Hors Taxe must be an numeric',
            'baseht.tva' => 'TVA must be an numeric',
            'remise.numeric' => 'Remise must be an numeric',
            'totalht.numeric' => 'Total Hors Taxe must be an numeric',
            'totalttc.numeric' => 'TTC must be an numeric',
            ## Exist Validation
            'command_id' => 'Command does not exists',
        ];
    }

}
