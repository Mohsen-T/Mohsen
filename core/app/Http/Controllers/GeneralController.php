<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;
use App\Models\General;
use App\User;
use App\Admin;
use Auth;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GeneralController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $general = General::first();
        if($general == null)
        {
            $default = [
                'title' => 'THESOFTKING',
                'subtitle' => 'Subtitle',
            ];
            General::create($default);
            $general = General::first();
        }

        return view('admin.website.general', compact('general'));
    }

    public function update(Request $request)
    {
        $general = General::first();

        $this->validate($request,
            [
                'title' => 'required',
            ]);

        $general['title'] = $request->title;
        $general['subtitle'] = $request->subtitle;

        $general->save();

        return back()->with('success', 'General Settings Updated Successfully!');
    }

    public function logo()
    {
        return view('admin.website.logo');
    }
    public function logoupdate(Request $request)
    {
        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('logo'))
        {
            $request->logo->move('assets/landing/images','logo.png');
        }
        if($request->hasFile('icon'))
        {
            $request->icon->move('assets','favicon.png');
        }

        return back()->with('success','Logo and Icon Updated successfully.');
    }

    public function changeprofile()
    {
        return view('admin.auth.changepass');
    }

    public function updateprofile(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = Auth::guard('admin')->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        $user->save();

        return back()->with('success', 'Profile Updated');

    }

    public function validator(array $data)
    {
        $messages = [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Already used email',
            'username.required' => 'Username is required',
            'username.unique' => 'Already used username'
        ];

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('admins')->ignore(Auth::guard('admin')->user()->id),
            ],
            'username' => [
                'required',
                'max:255',
                Rule::unique('admins')->ignore(Auth::guard('admin')->user()->id),
            ]
        ],$messages);
    }

    public function updatepass()
    {
        $user = Auth::guard('admin')->user();

        if(Hash::check(Input::get('passwordold'), $user['password']) && Input::get('password') == Input::get('password_confirmation'))
        {
            $user->password = bcrypt(Input::get('password'));
            $user->save();
            return back()->with('success', 'Password Changed');
        }
        else {
            {
                return back()->with('alert', 'Password Not Changed');
            }
        }
    }

}
