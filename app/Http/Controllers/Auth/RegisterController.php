<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Phone;
use App\Address;
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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'e-mail' => 'required|string|email|max:255|unique:users,email',
            'senha' => 'required|string|min:6',
            'public_contact_info' => 'required',
            'number' => 'required',
            'whatsapp_available' => 'required',
            'state' => 'required',
            'city' => 'required',
            'district' => 'required',
            'street' => 'required',
            'number' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['e-mail'],
            'password' => Hash::make($data['senha']),
            'public_contact_info' => $data['public_contact_info'] == 'true' ? true : false,
        ]);

        $phone = Phone::create([
            'user_id' => $user->id,
            'number' => $data['phone'],
            'whatsapp_available' => $data['whatsapp_available'] == 'true' ? true : false,
        ]);

        $address = Address::create([
            'user_id' => $user->id,
            //'country' , // brasil por default
            'state' => $data['state'] ,
            'city' => $data['city'] ,
            'district' => $data['district'] , 
            'street' => $data['street'] ,
            'number' => $data['number'] ,
            'complement' => $data['complement'] 
        ]);

        return $user;
    }
}
