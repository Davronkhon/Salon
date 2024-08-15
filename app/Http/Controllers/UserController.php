<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        $users = User::all();
        return view('user.create', compact('users'));
    }
    public function store(Request $request)
    {
        $users = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create($users);
        return redirect()->route('user.index')->with('success', 'User pasts');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $users = User::findOrFail($id);
        $users->update($validated);
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $user = User::findOrFail($id);
            $user->delete();
        });
        return redirect()->route('user.index')->with('message', 'User deleted');
    }

}
