<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoutiqueRequest extends FormRequest
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
            'boutLib' => 'required|max:50',
            'botAdresse' => 'required|max:100',
            "boutTel" => 'required|max:15',
            "boutFax" => 'required|max:15',
            "boutMail" => 'required|email',
        ];
    }

    public function attributes(): array
    {
        return [
            'boutLib' => 'Boutique Libelle',
            'botAdresse' => 'Boutique Adressse',
            'boutTel' => 'Boutique Telephone',
            'boutFax' => 'Boutique Fax',
            'boutMail' => 'Boutique Email',
            'boutDescription' => 'Description',
        ];
    }
}
