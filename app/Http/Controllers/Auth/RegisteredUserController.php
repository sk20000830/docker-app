<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\Postcode;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name_sei' => ['required', 'string', 'max:50'],
            'name_mei' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number1' => ['required', 'numeric', 'digits_between:1,5'],
            'phone_number2' => ['required', 'numeric', 'digits_between:1,5'],
            'phone_number3' => ['required', 'numeric', 'digits_between:1,5'],
            'post_code1' => ['required', new Postcode],
            'post_code2' => ['required', 'numeric', 'digits:4'],
            'adress' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name_sei' => $request->name_sei,
            'name_mei' => $request->name_mei,
            'email' => $request->email,
            'phone_number1' => $request->phone_number1,
            'phone_number2' => $request->phone_number2,
            'phone_number3' => $request->phone_number3,
            'post_code1' => $request->post_code1,
            'post_code2' => $request->post_code2,
            'adress' => $request->adress,
            'birthday' => $request->birthday,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
