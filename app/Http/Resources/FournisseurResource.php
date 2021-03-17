<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FournisseurResource extends JsonResource
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
            'Email'=> $this->fourmail,
            'numtelephone'=> $this->fourtel,
            'Fax'=> $this->fourfax,
             'Adresse'=> $this->fouradresse ,
             'Descrption'=> $this->fourdescription,
       
        ];
    }
}
