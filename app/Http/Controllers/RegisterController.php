<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect('/index');
    }
}
