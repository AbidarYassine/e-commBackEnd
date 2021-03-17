<?php


namespace App\Service\ServiceImpl;


//use App\Models\Boutique;
use App\Models\Command;

class CommandServiceImpl implements \App\Service\CommandService
{
  
    public function getAllCommands(){
        return Command::all();
    }

    public function save($command){
        return Command::create($command);
    }

    public function findById($id){
        return Command::findOrFail($id);
    }


    public function deleteCommand($command){
        $command=$this->findById($command);
        return $command->delete();
    }
/// ????
    public function updateCommand($command){
        return Command::whereId($command->id)->update($command->all());

    }
    
}
