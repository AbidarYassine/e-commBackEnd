<?php

namespace App\Http\Controllers;


use App\Http\Resources\CommandResource;
use App\Service\CommandService;
use App\Service\FactureService;


use App\Models\Command;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommandService $commandService) :JsonResponse
    {
        return $this->returnData(CommandResource::collection($commandService->getAllcommands()), '200');
    }

    /**
     * Show the form for creating a new resource.
     *


     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CommandService $commandService)
    {
        try {
            $command = [
                "cmdDate" => $request->cmdDate,
                "toatlcmd" => $request->toatlcmd,
                "cmdDescription" => $request->cmdDescription,
                "etat_command_id" => $request->etat_command_id,
                "user_id" => $request->user_id,
                ];
            $commandSaved = $CommandService->save($command));
        }



        catch (CommandAlreadyExistException | \Exception $ex) {
       return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
    return response()->json(["error" => $er->getMessage()], 422);
}
        return $this->returnData(new Command($commandSaved), '201');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Command $command
     * @return \Illuminate\Http\Response
     */
    public function show($command , CommandService $commandService)
    {
        return new CommandResource($commandService->findById($command));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Command $command
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Command $command
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandService $commandService)
    {
        return $commandService->updateCommand($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Command $command
     * @return \Illuminate\Http\Response
     */
    public function destroy($command , CommandService $commandService)
    {
        return $commandService->deleteCommand($command);

    }
}
