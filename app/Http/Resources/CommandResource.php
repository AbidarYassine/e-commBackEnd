<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommandResource extends JsonResource
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
            'Date'=> $this->cmdDate,
            'toatlcmd'=> $this->toatlcmd,
            'Description'=> $this->cmdDescription,
             'etat_command'=> $this->etat_command_id ,
             'user_id'=> $this->user,
       
        ];
    }
}
