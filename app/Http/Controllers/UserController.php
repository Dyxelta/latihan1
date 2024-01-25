<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function registerAccount(Request $request) {

        $request->validate([
            'first_name' => 'required|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:Customer,Admin',
            'gender' => 'required',
            'picture' => 'required|image',
            'password' => 'required|alpha_num',
            'confirm_pass' => 'required_with:password|alpha_num|same:password',
        ]);

        $user = new User;
        $user->firstName = $request->input('first_name');
        $user->lastName = $request->input('last_name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->gender = $request->input('gender');
        $imagePath = $request->file('picture')->store('user', 'public');
        $user->picture = $imagePath;
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('login');

    }

    public function loginAccount(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            if(auth()->user()->role == 'Admin') {

                return redirect()->route('home');

            } else if (auth()->user()->role == 'Customer') {

                return redirect()->route('home');

            }
        }

        return redirect()->back()->with('error', 'account not found');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function getAllUser() {
        $users = User::all();

        return view('admin.account', compact('users'));
    }

    public function deleteUser(User $user) {
        Storage::disk('public')->delete($user->picture);

        $user->delete();

        return redirect()->back();
    }

    public function userById(User $user) {

        return view('admin.update', compact('user'));
    }

    public function updateUser(Request $request, User $user) {

        $user->role = $request->role;
        $user->save();

        return redirect()->route('account');
    }

    public function profile(Request $request) {

        $user = Auth::user();

        return view('customer.profile', compact('user'));
    }

    public function updateProfile(Request $request, User $user) {

        $request->validate([
            'first_name' => 'required|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(auth()->id())],
            'gender' => 'required',
            'picture' => 'image',
            'password' => 'required|alpha_num',
            'confirm_pass' => 'required_with:password|alpha_num|same:password',
        ]);

        $user->firstName = $request->input('first_name');
        $user->lastName = $request->input('last_name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');

        if($request->picture) {
            $imagePath = $request->file('picture')->store('user', 'public');
            $user->picture = $imagePath;
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('home');
    }
}
