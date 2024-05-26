<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // show all list
    public function index()
    {
        $users = User::latest()->paginate(5);
        return new UsersResource(true, "List Data User", $users);
    }

    // create user
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|regex:/^[a-zA-Z\s]+$/',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'nullable|string',
            'address'  => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create($validator->validated());

        return new UsersResource(true, "User Created!", $user);
    }

    // show by id
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UsersResource(true, "Success", $user);
    }

    // update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user->update($validator->validated());

        return new UsersResource(true, "User Updated!", $user);
    }

    // delete user
    public function softDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return new UsersResource(true, "User Deleted!", null);
    }
}
