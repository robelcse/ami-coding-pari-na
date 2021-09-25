<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\models\User;
use App\repositories\AuthRepository;

class AuthAPIController extends Controller
{
    public $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function createToken()
    {
        $user = User::first();
        $accessToken = $user->createToken('Token Name')->accessToken;
        return $accessToken;
    }


    public function login(Request $request)
    {
        $this->validate($request, [
           'email'=>'required',
           'password'=>'required'
        ]);

        if ($this->authRepository->checkIfAuthenticated($request)) {
            $user = $this->authRepository->findUserByEmailAddress($request->email);
            $accessToken = $user->createToken('authToken')->accessToken;
            return response()->json([
                'success' => true,
                'message' => 'Logged in successully !!',
                'user' => $user,
                'access_token' => $accessToken,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry Invalid Email and Password',
                'errors' => null,
            ]);
        }
    }


    public function register(Request $request)
    {

        $this->validate($request, [
            'name'=>'required',
            'email' => 'required|email|max:100|unique:users',
            'phone'=>'required',
            'country'=>'required',
            'gender'=>'required',
            'password' => 'required|min:8',
         ]);

        $user = $this->authRepository->registerUser($request);
        if (!is_null($user)) {
            $user = $this->authRepository->findUserByEmailAddress($request->email);
            $accessToken = $user->createToken('authToken')->accessToken;
            return response()->json([
                'success' => true,
                'message' => 'Registered successully !!',
                'user' => $user,
                'access_token' => $accessToken,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Registration Cannot successfull !',
                'errors' => null,
            ]);
        }
    }
}//end class