<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function editProfile()
    {
        return view('users.profile.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = auth()->user();
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]); 

        toast('Profile updated successfully!','success');
        return redirect()->route('profile.index');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $current_password = auth()->user()->password;
        if(!Hash::check($request->current_password, $current_password)){
            toast('Current password does not match!','error');
            return redirect()->back();
        }

        $user = auth()->user();
        
        $user->update([
            'password' => Hash::make($request->password),
        ]); 

        toast('Password updated successfully!','success');
        return redirect()->route('profile.index');
    }
}
