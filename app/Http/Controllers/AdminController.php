<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/home');
    }

    public function register()
    {
        return view('admin/register');
    }
    public function forgot()
    {
        return view('admin/forgot');
    }
    public function formforgot()
    {

        return view('admin/formforgot');
    }

    public function validatelogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $users = DB::table('users')->where(['email' => $request->email])->get();

        if (count($users) > 0) {        //     
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->email_verified_at == null) {
                    return back()->with('warning', 'Please verify your email to continue');
                } else {
                    return \redirect(route('admin.home'))->with('success', 'Logged In Successfully');
                }
            } else {
                return back()->with('warning', 'Password salah');
            }
        } else {
            return back()->with(['info' => 'Email tidak terdaftar Silahkan mendaftar atau hubungi admin.']);
        }
        // dd(count($users));
    }
    public function loginadmin()
    {

        return view('admin/login');
    }
    public function resent()
    {
        $data = session()->get('data');
        dd($data);
        // return view('admin/resent', compact($data));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
