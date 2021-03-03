<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:4',
            'birth_day' => 'required|date|date_format:Y-m-d'
        ]);

        $user = User::create(

            $validated
        );

        return $user;
    }

    public function update(User $users)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed'
        ]);

        $users->name = request('name');
        $users->email = request('email');
        $users->password = bcrypt(request('password'));

        $users->save();

        return $users;

    }

    public function delete(User $id){

        $id->delete();

    }

    public function user_id(User $id){

        return $id;
    }

    public function index()
    {
        return ('user.index', [
            'users' => User::table('users')->paginate(3)
        ]);
    }




}
