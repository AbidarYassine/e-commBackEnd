<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserRessource;
use App\Models\User;
use App\Service\PrivillegeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);

    }//end __construct()


    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $token_validity = (24 * 60);

        $this->guard()->factory()->setTTL($token_validity);

        if (!$token = $this->guard()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

    }//end login()


    public function register(Request $request, PrivillegeService $privilService)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'login' => 'required|string|between:2,100',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [$validator->errors()],
                422
            );
        }
        /* set Default Role to new User*/
        $privilId = 0;
        $privil = $privilService->findByLibelle("USER");
        if ($privil == null) {
            $privillege = [
                "privLib" => strtoupper("USER"),
                "description" => "USER Privilege",
            ];
            $privilId = $privilService->save($privillege)->id;
        } else {
            $privilId = $privil->id;
        }
        $user = User::create(
            array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password), 'privilege_id' => $privilId]
            )
        );
        return response()->json(['message' => 'User created successfully', 'user' => new UserRessource($user)]);

    }//end register()


    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'User logged out successfully']);

    }//end logout()


    public function profile()
    {
        return response()->json($this->guard()->user());

    }//end profile()


    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());

    }//end refresh()


    protected function respondWithToken($token)
    {
        return response()->json(
            [
                'token' => $token,
                'token_type' => 'bearer',
                'token_validity' => ($this->guard()->factory()->getTTL() * 60),
            ]
        );

    }//end respondWithToken()


    protected function guard()
    {
        return Auth::guard();

    }//end guard()


}//end class
