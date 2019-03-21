<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\History;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
    }

    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }

    public function option()
    {
        $options = User::findOrFail(Auth::user()->id);

        return response()->json(
            [
                'status' => 'success',
                'options' => $options->toArray()
            ], 200);
    }

    public function transactions()
    {
        $id = Auth::user()->id;
        $transactions = History::where('user_id', $id)->limit(10)->orderBy('id', 'desc')->get();

        return response()->json(
            [
                'status' => 'success',
                'transactions' => $transactions->toArray()
            ], 200);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param  int $id
     * @return UserResource
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);
        $user->update($data);

        return new UserResource($user);
    }
}
