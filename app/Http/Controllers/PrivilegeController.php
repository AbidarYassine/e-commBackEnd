<?php

namespace App\Http\Controllers;

use App\Exceptions\Privilege\PrivilegeNotFoundException;
use App\Http\Requests\PrivilegeRequest;
use App\Http\Resources\PrivilegeRessource;
use App\Models\Privilege;
use App\Service\PrivillegeService;
use App\Traits\GeneralTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PrivilegeController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @param PrivillegeService $privilService
     * @return JsonResponse
     */
    public function index(PrivillegeService $privilService): JsonResponse
    {

        try {
            $data = $privilService->getAllPrevillege();
        } catch (\Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(PrivilegeRessource::collection($data), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PrivilegeRequest $request
     * @param PrivillegeService $privilService
     * @return JsonResponse
     */
    public function store(PrivilegeRequest $request, PrivillegeService $privilService)
    {
        $privillege = [
            "privLib" => strtoupper($request->privLib),
            "description" => $request->description,
        ];
        try {
            $data = $privilService->save($privillege);
        } catch (\Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(new PrivilegeRessource($data), '201');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Privilege $privilege
     * @param PrivillegeService $privilService
     * @return JsonResponse
     */
    public function show($id, PrivillegeService $privilService): JsonResponse
    {
        try {
            $result = $privilService->findById($id);
        } catch (PrivilegeNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 404);
        } catch (\Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(new PrivilegeRessource($result), '200');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Privilege $privilege
     * @return \Illuminate\Http\Response
     */
    public function edit(Privilege $privilege)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PrivillegeService $privilService
     * @return JsonResponse
     */
    public function update(Request $request, PrivillegeService $privilService)
    {
        try {
            $privilService->updatePrivillege($request);
        } catch (PrivilegeNotFoundException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnSuccessMessage('Successfully update Privilege', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param PrivillegeService $privilService
     * @return JsonResponse
     */
    public function destroy($id, PrivillegeService $privilService): JsonResponse
    {
        try {
            $privilService->deletePrivillege($id);
        } catch (\Exception | PrivilegeNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnSuccessMessage('Successfully delete Privilege', 204);
    }

    public function findByLibelle($lib, PrivillegeService $privilService)
    {
        try {
            $result = $privilService->findByLibelle($lib, true);
        } catch (PrivilegeNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 404);
        } catch (\Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(new PrivilegeRessource($result), '200');
    }
}
