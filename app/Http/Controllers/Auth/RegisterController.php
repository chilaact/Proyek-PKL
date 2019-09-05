<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Biodata;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $biodata = Biodata::all();

        return view('auth.register', compact('biodata'));
    }

   
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), 
        [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:45',
            'tanggal_lahir' => 'required',
            'telp' => 'required|string|max:45',
            'alamat' => 'required',

        ],

        $messages = 
        [
            'email.required' => 'E-mail tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'nama.required' => 'Nama tidak boleh kosong!',
            'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong!',
            'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong!',
            'telp.required' => 'Telp tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',

        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }

        //Table Users
        $user = new User;
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->level = 1;
        $user->save();

        //Table Biodata 
        $user_id = $user->id;
        $biodata = new Biodata;
        $biodata->user_id = $user_id;
        $biodata->nama = Input::get('nama');
        $biodata->tempat_lahir = Input::get('tempat_lahir');
        $biodata->tanggal_lahir = Input::get('tanggal_lahir');
        $biodata->telp = Input::get('telp');
        $biodata->alamat = Input::get('alamat');

        $biodata->save();
     

        return redirect()->back()->with('success', 'Registrasi Anda telah berhasil!. Silakan login dengan menggunakan email dan password Anda.');
    }


}