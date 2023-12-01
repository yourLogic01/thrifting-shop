<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!auth()){
            toast("You are not authorized to perform this action", 'error');
            return redirect()->route('user.index');
        }
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'address' => 'required',
            'phone' => 'required',
            'position' => 'required',
        ]);

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
       

        toast("User Created Successfully", 'success');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if(!auth()){
            toast("You are not authorized to perform this action", 'error');
            return redirect()->route('user.index');
        }
        $request->validate([
            'name' => 'required|max:255',
            'email' => "required|email|unique:users,email,$user->id",
            'address' => 'required',
            'phone' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        toast("User Updated Successfully", 'success');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(!auth()){
            toast("You are not authorized to perform this action", 'error');
            return redirect()->route('user.index');
        }

        $user->delete();

        toast("User Deleted Successfully", 'warning');
        return redirect()->route('user.index');
    }
}
