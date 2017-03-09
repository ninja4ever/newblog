<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
       * Get a validator for an incoming registration request.
       *
       * @param  array  $data
       * @return \Illuminate\Contracts\Validation\Validator
       */
      protected function validator(array $data)
      {
          $messages = [
            'name.required'=>'Pole nazwy użytkownika jest wymagane.',
            'name.max'=>'Maksymalna długość nazwy użytkownika to :max znaków.',
            'email.required'=>'Pole email jest wymagane.',
            'email.email'=>'Wymagany jest poprawny adres email.',
            'email.max'=>'Adres email nie może byc dłuższy niż :max znaków.',
            'email.unique'=>'Adres email jest już w bazie.',
            'password.required'=>'Pole hasła jest wymagane.',
            'password.min'=>'Hasło musi byc dłuższe niż :min znaków.',
            'password.confirmed'=>'Wpisz ponownie hasło.',
            'password_confirmation.required'=>'Pole powtórzenia hasła jest wymagane.',
            'password_confirmation.min'=>'Powtórzone hasło musi mieć :min znaków.',
            'password_confirmation.same'=>'Pole hasła i powtórzenia hasła muszą być identyczne.',
            'role.required'=>'Wybranie roli użytkownika jest wymagane.',
            'role.integer'=>'Pole roli musi byc liczbą.',
            'active.required'=>'Wybranie aktywności użytkownika jest wymagane.',
            'active.integer'=>'Pole aktywności musi być liczbą.',
          ];
          return Validator::make($data, [
              'name' => 'required|max:255',
              'email' => 'required|email|max:255|unique:users,email',
              'password' => 'required|min:6|confirmed',
              'password_confirmation' => 'required|min:6|same:password',
              'role'=>'required|integer',
              'active'=>'required|integer'
          ],$messages);
      }

      /**
       * Create a new user instance after a valid registration.
       *
       * @param  array  $data
       * @return User
       */
      protected function create(array $data)
      {
          return User::create([
              'name' => $data['name'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'active'=>$data['active'],
              'role'=>$data['role']
          ]);
      }
      public function register(Request $request)
      {
          $this->validator($request->all())->validate();
          event(new Registered($user = $this->create($request->all())));
          return $this->registered($request, $user)
              ?: redirect($this->redirectPath());
      }
}
