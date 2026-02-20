<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(25);

        return view("users.index")->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        return view("users.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "string", "max:255"],
            "username" => ["required", "string", "max:255"],
            "password" => ["required", "string", "max:255"],
            "is_admin" => ["boolean"]
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password); //Hash::make($user->password);
        $user->is_admin = $request->has('is_admin') ? 1 : 0;
        $user->save();

        // User::create([
        //     "name" => $request->name,
        //     "username" => $request->username,
        //     "password" => $request->password,
        // ]);

        return redirect()->route("users.index")->with("success", "Users created successfully.");
    }
}
