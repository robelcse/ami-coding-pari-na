<?php

namespace App\repositories;

use App\interfaces\AuthInterface;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface
{
    public function checkIfAuthenticated(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //  $user = User::where('email','=', $request->email)->first();
            //  Auth::login($user);
            return true;
        }
        return false;
    }

    public function registerUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->save();
        return $user;
    }

    public function findUserByEmailAddress($email)
    {
        $user = User::where('email', $email)->first();
        return $user;
    }
}