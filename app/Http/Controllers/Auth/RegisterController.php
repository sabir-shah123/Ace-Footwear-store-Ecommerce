<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/d_home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $valid= Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'min:6','same:password'],
            'gender' => ['required'],
            'cell' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'city' => ['required'],

            'role' => ['required'],
            'cnic' => ['required', 'string'],
            'uphoto' => ['required', 'image'],

        ]);
        dd($valid->errors());
        return $valid;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $filename = '';

            $this->validator();
            $allowedfileExtension = ['jpg', 'jped', 'png'];
            $files = $data->uphoto;

            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $filename1 = $filename.'.'.$extension;
                $files->move('images/admin', $filename1);
                /*                    $product->image_1 = $filename1;*/





        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'cell' => $data['cell'],
            'address' => $data['address'],
            'city' => $data['city'],
            'postal_code' => $data['postal_code'],
            'role' => $data['role'],
            'cnic' => $data['cnic'],
            'uphoto' => $filename,
            'newsletter' => $data['newsletter'],
        ]);
    }
}
