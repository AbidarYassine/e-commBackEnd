<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BoutiqueRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                  => $this->id,
            'boutiqueLibelle'     => $this->boutLib,
            'botiqueAdresse'      => $this->botAdresse,
            'boutiqueTel'         => $this->boutTel,
            'boutiqueFax'         => $this->boutFax,
            'boutiqueMail'        => $this->boutMail,
            'boutiqueDescription' => $this->boutDescription,
        ];
    }
}
