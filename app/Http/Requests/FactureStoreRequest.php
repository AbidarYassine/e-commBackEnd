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
            'command_id' => 'exists:App\Models\Command,id'  //4ire mn documentation/
        ];
    }

    public function attributes(): array
    {
        return [
            'datefact' => 'Date Facture',
            'baseht' => 'Base Hors Taxe',
            'tva' => 'TVA',
            'remise' => 'remise',
            'totalht' => 'Total Hors Taxe',
            'totalttc' => 'TTC',
            'command_id' => 'Command',
        ];
    }

}
