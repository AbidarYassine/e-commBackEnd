<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FactureResource extends JsonResource
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
            'id'            => $this->id,
            'DateFacture'   => $this->datefact,
            'baseHt'        => $this->baseht,
            'tva'           => $this->tva,
            'remise'        => $this->remise,
            'totalHT'       => $this->totalht,
            'totalTTC'      => $this->totalttc,
            'command_id'    => $this->command,
        ];
    }
}
