
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'designation'=> $this->ertdesignation,
        'prix'=> $this->prix,
        'quantite'=> $this->qtestock,
        'TVA'=> $this->tauttva ,
        'Remise'=> $this->tautremise,
        'artimg'=> $this->artimg,
        'description'=> $this->artdescription,
        'marque'=> $this->marque_id,
        'categorie'=> $this->category_id,
        
        ];
    }
}
