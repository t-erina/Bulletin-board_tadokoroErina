<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser as RequestsStoreUser;
use App\Models\Users\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function storeUser(RequestsStoreUser $request)
    {
        $user = $request->input->get();
        dd($user);

        User::create([
            'username' => $user->username,
            'email' => $user->email,
            'password' => $user->password,
            'admin_role' => '1',
        ]);

        return route('added');
    }
}
