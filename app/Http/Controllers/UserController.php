<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(6);
        return view("Users.index", ['users' => $users]);
    }

    public function create()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('Users.register');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8',
            'image' => ['max:500', 'image', 'mimes:jpg,png'],
        ]);

        // return $request;

        $user = new User();

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $filepath = $request->image->storeAs('public/uploads/users/', $filename);
            $user->image = 'storage/uploads/users/' . $filename;
        } else {
            $user->image = 'storage/uploads/users/user_avatar.png';
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        // Hash Password
        $user->password = bcrypt($request->password);
        $user->save();
        $user->assignRole('member');
        auth()->login($user);
        $msg = 'You have successfully created your account!';
        return redirect('/')->with('success', $msg);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('Users.login');
        }
    }

    public function authenticate(Request $request)
    {
        $userInput = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($userInput)) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function show()
    {
        return view('Users.profile');
    }

    public function showPasswordForm()
    {
        return view('Users.change_password');
    }

    public function update(Request $request)
    {
        $no_profile_pic = $request->no_profile_pic == "on" ? true : false;
        // return $request->no_profile_pic;
        $user = User::findOrFail(auth()->user()->id);
        // return $user;
        $request->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['max:2000', 'image', 'mimes:jpg,png']
            ]);
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $imgData = Image::make($request->file('image'))->fit(200)->encode('jpg');
            Storage::put('public/uploads/users/' . $filename, $imgData);
            // $filepath = $request->image->storeAs('public/uploads/users/', $filename);
            if ($user->image != 'storage/uploads/users/user_avatar.png') {
                File::delete(public_path($user->image));
            }
            $user->image = 'storage/uploads/users/' . $filename;
        }

        if ($no_profile_pic) {
            if ($user->image != 'storage/uploads/users/user_avatar.png') {
                File::delete(public_path($user->image));
            }
            $user->image = 'storage/uploads/users/user_avatar.png';
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();
        $msg = 'You have successfully updated your account!';
        return redirect('/profile')->with('success', $msg);
    }

    public function updatePassword(Request $request)
    {

        if (Hash::check($request->current_password, auth()->user()->password)) {
            // return "✅ Password Updated!";
            $request->validate([
                'password' => 'required|confirmed|min:8',
            ]);
            $user = User::findOrFail(auth()->user()->id);
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('users.password')->with('success', "✅ Password updated successfully!");
        } else {
            return redirect()->route('users.password')->with('delete', "⛔ Current password entered does not match with your existing password.");
        }
    }
}
