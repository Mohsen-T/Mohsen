<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminMail;
use App\Admin;

class UserlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('admin.user.users', compact('users'));
    }

    public function userSearch(Request $request)
    {
        $this->validate($request,
            [
                'search' => 'required',
            ]);

        $users = User::where('username', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('firstname', 'like', '%' . $request->search . '%')->orWhere('lastname', 'like', '%' . $request->search . '%')->get();
        if(!$users)
            $users = [];
        return view('admin.user.search', compact('users'));

    }


    public function single($id)
    {
        $user = User::findorFail($id);

        return view('admin.user.single', compact('user'));
    }

    public function email($id)
    {
        $user = User::findorFail($id);
        return view('admin.user.email', compact('user'));
    }

    public function sendemail(Request $request)
    {
        $this->validate($request,
            [
                'emailto' => 'required|email',
                'reciver' => 'required',
                'subject' => 'required',
                'emailMessage' => 'required'
            ]);
        $to = $request->emailto;
        $name = $request->reciver;
        $subject = $request->subject;
        $message = $request->emailMessage;

//        send_email($to, $name, $subject, $message);
        Mail::to($to)->send(new AdminMail($name, $subject, $message));

        return back()->withSuccess('Mail Sent Successfuly');

    }

    public function broadcast()
    {
        return view('admin.user.broadcast');
    }

    public function broadcastemail(Request $request)
    {
        $this->validate($request,
            [
                'subject' => 'required',
                'emailMessage' => 'required'
            ]);

        $users = User::all();

        foreach ($users as $user) {

            $to = $user->email;
            $name = $user->username;
            $subject = $request->subject;
            $message = $request->emailMessage;

            Mail::to($to)->send(new AdminMail($name, $subject, $message));
        }

        return back()->withSuccess('Mail Sent Successfuly');
    }


    public function statupdate(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request,
            [
                'username' => 'required|string|max:255',
                'phone' => 'required|string|max:255'
            ]);

        $user['username'] = $request->username;
        $user['phone'] = $request->phone;
        $user['status'] = $request->status == "1" ? 1 : 0;

        $user->save();

        $msg = 'Your Profile Updated by Admin';

//        Mail::to($user->email)->send(new AdminMail($user->username, 'Profile Updated', $msg));
//        $sms = 'Your Profile Updated by Admin';
//        send_sms($user->phone, $sms);

        return back()->withSuccess('User Profile Updated Successfuly');
    }

    public function banusers()
    {
        $users = User::where('status', '0')->orderBy('id', 'desc')->paginate(10);
        return view('admin.user.banned', compact('users'));
    }


    public function stuffManagement()
    {
        $admins = Admin::where('id', '!=', 1)->paginate(10);
        return view('admin.stuff.stuff', compact('admins'));
    }

}
