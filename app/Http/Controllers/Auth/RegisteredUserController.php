<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistroRequest;
use App\Models\rols;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $rols = rols::all();
        return view('admin.users.form', compact('rols'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(RegistroRequest $request): RedirectResponse
    {


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'last_name' => $request->last_name,
            'rol_id' => $request->rol_id,
            'telefono' => $request->telefono
        ]);

        event(new Registered($user));

        Auth::login($user);
       
        return redirect()->route('admin.dashboard', compact('user'));
    }
}
