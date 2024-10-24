<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\ReadUserRepositoryInterface;
use App\Interfaces\WriteUserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct(
        private ReadUserRepositoryInterface $readUserRepositoryInterface,
        private WriteUserRepositoryInterface $writeUserRepositoryInterface
    )
    {
        $this->readUserRepositoryInterface = $readUserRepositoryInterface;
        $this->writeUserRepositoryInterface = $writeUserRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->readUserRepositoryInterface->index();
        return ApiResponseClass::sendResponse($data, "", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $details =[
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        DB::beginTransaction();

        try{
            $user = $this->writeUserRepositoryInterface->store($details);

            $user->assignRole($request->role);

            DB::commit();
            return ApiResponseClass::sendResponse(new UserResource($user), "Usuario registrado",201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->readUserRepositoryInterface->getById($id);
        return ApiResponseClass::sendResponse($data, "", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
