<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class PasswordController extends Controller
{

        // Display the form to change the password for a specific user
        public function showChangePasswordForm()
        {
            return view('changePassword');
        }
    
        // Process the password change request
        public function changePassword(Request $request)
        {
            $user = User::findOrFail(auth()->user()->id);
    
            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'new_password' => [
                    'required',
                    'string',
                    'min:8',
                    'max:64',
                    'regex:/^(?=.*[0-9]).{8,32}$/',
                ],
                'confirm_password' => 'required|same:new_password',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            if (!Hash::check($request->input('old_password'), $user->password)) {
                return back()->withErrors(['old_password' => 'Old password is incorrect']);
            }
    
            $user->password = Hash::make($request->input('new_password'));
            $user->save();
    
            return redirect('/')->with('status', 'Password updated successfully');
        }
    }