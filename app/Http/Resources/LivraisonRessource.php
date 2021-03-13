<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LivraisonRessource extends JsonResource
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
            'id' => $this->id,
            'livdate' => $this->livdate,
            'livdescription' => $this->livdescription,
            'command' => $this->command,
            'boutique' => $this->boutique,
            'mode_livraison' => $this->modelivraison,
        ];
    }
}
