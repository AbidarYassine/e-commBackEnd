<?php

namespace App\Http\Controllers;


use App\Http\Resources\CommandRessource;
use App\Service\CommandService;
use App\Service\FactureService;


use App\Models\Command;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommandService $commandService)
    {
        return CommandResource::collection($commandeService->getAllFacture());
    }

    /**
     * Show the form for creating a new resource.
     *
     
   
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CommandService $commandService)
    {
        
        $command = [
            "cmdDate" => $request->cmdDate,
            "toatlcmd" => $request->toatlcmd,
            "cmdDescription" => $request->cmdDescription,
            "etat_command_id" => $request->etat_command_id,
            "user_id" => $request->user_id,
           
        ];
        return new CommandRessource($CommandService->save($command));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function show($command , CommandService $commandService)
    {
        return new CommandRessource($commandService->findById($command));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandService $commandService)
    {
        return $commandService->updateCommand($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function destroy($command , CommandService $commandService)
    {
        return $commandService->deleteCommand($command);

    }
}
