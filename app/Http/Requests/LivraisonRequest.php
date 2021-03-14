<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivraisonRequest extends FormRequest
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
            'livdate' => 'required|date|date_format:Y-m-d|after:yesterday',
            'modeliv_id' => 'exists:App\Models\Modelivraison,id',
            'command_id' => 'exists:App\Models\Command,id',
            'boutique_id' => 'exists:App\Models\Boutique,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'livdate' => 'Livraison Date',
            'modeliv_id' => 'Livraison Mode',
            'command_id' => 'Command',
            'boutique_id' => 'Boutique',
        ];
    }
}
