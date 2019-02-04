<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Avatar;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nickname' => ['required', 'string', 'max:50', 'unique:users', 'alpha_dash'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'avatar' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::make([
            'name' => $data['name'],
            'email' => $data['email'],
            'nickname' => $data['nickname'],
            'password' => Hash::make($data['password']),

        ]);

        if (isset($data['avatar'])) {
            $avatarFileName = $data['avatar']->store('');
            Image::load('storage/' .$avatarFileName)
                ->crop(Manipulations::CROP_CENTER, 100, 100)->save();

            $user->addMedia('storage/' .$avatarFileName)->toMediaCollection('avatars');
            $user->has_avatar = true;
        } else {
            $fileName = $user->id . '_avatar' . time() . '.png';
            Avatar::create($user->name)->save($fileName, 100);
            $user->addMedia($fileName)->toMediaCollection('avatars');
        }
        $user->save();
        return $user;
    }
}