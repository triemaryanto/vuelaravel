<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\VerifyEmail;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;

use Illuminate\Http\Request;
use App\Models\VerifyPassword;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'password' => 'required|confirmed|min:6',
            ],
            [
                'email.required' => 'Email harus diisi',
                'email.email' => 'Format email harus sesuai [xxxxx@xxx.xxx]',
                'email.unique' => 'Alamat Email sudah digunakan, ganti yang lain atau klik lupa password',
                'password.required' => 'Password harus diisi !.',
                'password.confirmed' => 'Password tidak sama !.',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $user->id,
        ]);
        VerifyPassword::create([
            'validasi' => Str::random(60),
            'user_id' => $user->id,
        ]);
        $data = $user->id;
        Mail::to($user->email)->send(new VerifyEmail($user));
        return view('admin/resent', compact('data'))->with('success', 'Registrasi berhasil. Cek kotak masuk di email untuk verifikasi.');
    }

    public function resetpassword(Request $request, Mail $mailer)
    {
        $request->validate(
            [
                'email' => 'required',
            ],
        );
        $user = User::where('email', $request->email)->first();

        if ($user == '') {
            return \redirect(route('forgot'))->with('info', 'Emailmu tidak terdaftar');
        } else {
            // dd($user->VerifyPassword->validasi);

            $mailer::to($user->email)->send(new ForgotPassword($user));
            return \redirect(route('forgot'))->with('info', 'Permohonan reset password sudah di kirim ke email.');
            // $data = $user->verifyUser->token;
            // dd($data);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resent($id, Mail $mailer)
    {
        $user = User::where('id', $id)->get();
        foreach ($user as $user) {
        }
        $data1 = $user->email_verified_at;
        if ($data1 == '') {
            $mailer::to($user->email)->send(new VerifyEmail($user));
            $message = ('Kami telah mengirim ulang ke email (' . $user->email . '), Harap di cek kemabali.');
            $data = $user->id;
            return view('admin/resent', compact('data'))->with('message', $message);
            // $d = 1;
            // dd($data);
        } else {
            return redirect('/admin')->with('info', 'Emailmu sudah aktif.');
            // $c = 0;
            // dd($c);
        }
    }
    public function verifyEmail($token)
    {
        $verifiedUser = VerifyUser::where('token', $token)->first();
        if (isset($verifiedUser)) {
            $user = $verifiedUser->user;
            if (!$user->email_verified_at) {
                $user->email_verified_at = Carbon::now();
                $user->save();
                return \redirect(route('admin.login'))->with('success', 'Your Email has been Verified');
            } else {
                return \redirect()->back()->with('info', 'Your email has already been verified');
            }
        } else {
            return redirect(route('admin.login'))->with('error', 'Something went wrong!!');
        }
    }
    public function validasiPassword($validasi)
    {
        $validasiPassword = VerifyPassword::where('validasi', $validasi)->first();
        if (isset($validasiPassword)) {
            $user = $validasiPassword->user;
            $name = $user->name;
            $email = $user->email;
            return view('/admin/formforgot', compact('name', 'email'));
        } else {
            $data = 1;
            dd($data);
        }
    }
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
