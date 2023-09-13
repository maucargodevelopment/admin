<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'   => 'required',
            'username'   => 'required',
            'password'   => 'required'
        ]);

        $user = User::create([
            'name'             => $request->name,
            'username'         => $request->username,
            'email'            => $request->email,
            'role_id'          => $request->role_id,
            'password'         => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('users.index', $user)->withSuccess('New user created');
        } else {
            return redirect()->route('users.index')->with(['error' => 'Failed Insert Data!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user'  => $user, 'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = [
            'name'             => $request->name,
            'username'         => $request->username,
            'email'            => $request->email,
            'role_id'          => $request->role_id,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);


        return redirect()->route('users.index', $user)->withSuccess('User updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    public function activate(Request $request, User $user)
    {

        $user->status      = $request->state == "true" ? "Aktif" : "Tidak Aktif";
        $user->update();
        return ['state' => $user->status == "Aktif" ? true : false];
    }
}
