<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
  public function index(Request $request)
  {
    $points = User::all();
    return view('users.index', compact('points', 'request'));
  }

  public function create()
  {
    $roles = Role::all();
    return view('users.create', compact('roles'));
  }

  public function save(Request $request)
  {
    $validated = $request->validate([
      'dni' => 'required|unique:users',
      'email' => 'required|unique:users',
      'name' => 'required',
    ]);
    $data = $request->all();
    $data['password'] = Hash::make($data['dni']);
    User::create($data);
    return redirect()->route('users');
  }

  public function edit($id)
  {
    $user = User::find($id);
    $roles = Role::all();
    return view('users.edit', compact('user', 'roles'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $user = User::find($id);
    // $data['password'] = Hash::make($data['password']);
    $user->update($data);
    return redirect()->route('users');
  }

  public function delete($id)
  {
    $user = User::destroy($id);
    return redirect()->route('users');
  }
}
