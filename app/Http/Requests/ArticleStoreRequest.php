<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'ertdesignation' => 'required|min:4|max:100',
            'prix' => 'required|numeric',
            "qtestock" => 'required|numeric',
            'tauttva' => 'required|numeric',
            'tautremise' => 'required|numeric',
            'artimg' => 'required|numeric',
            'marque_id' => 'exists:App\Models\Marque,id' ,
            'category_id' => 'exists:App\Models\Categorie,id',

        ];
    }


    public function attributes(): array
    {
        return [
            'ertdesignation' => 'ertdesignation',
            'prix' => 'prix',
            'qtestock' => 'quantite de stock',
            'tauttva' => 'Taux de TVA',
            'tautremise' => 'taux de Remise',
            'artimg' => 'image Article',
            'marque_id' => 'marque',
            'category_id' => 'categorie',

        ];
}

}
