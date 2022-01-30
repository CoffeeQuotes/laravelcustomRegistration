<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

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
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('show',compact('user'));
    }

    /**
     * Display the update registration view.
     *
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('auth.register-update', compact('user'));
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'martial_status' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            //'date_of_anniversary' => ['required', 'date'],
            'date_of_joining' => ['required', 'date'],
            'personal_email_address' => ['required','email', 'max:255', 'unique:users'],
            'contact_number' => ['required', 'integer'],
            'role'=> ['required', 'string', 'max:255'],
            'department'=> ['required', 'string', 'max:255'],
            'designation'=> ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'contact_number' => $request->contact_number,
            'martial_status' => $request->martial_status,
            'date_of_birth' => $request->date_of_birth,
            'date_of_anniversary' => $request->date_of_anniversary,
            'date_of_joining' => $request->date_of_joining,
            'personal_email_address' => $request->personal_email_address,
            'role' => $request->role,
            'department' => $request->department,
            'designation' => $request->designation,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $email = $request->email;
        event(new Registered($user));

        // Auth::login($user);

        Mail::to($email)->send(new WelcomeMail($user));

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'martial_status' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            //'date_of_anniversary' => ['required', 'date'],
            'date_of_joining' => ['required', 'date'],
            'personal_email_address' => ['required','email', 'max:255'],
            'contact_number' => ['required', 'integer'],
            'role'=> ['required', 'string', 'max:255'],
            'department'=> ['required', 'string', 'max:255'],
            'designation'=> ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update($request->all());

        return redirect()->route('dashboard')->with('success', 'User updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard')
                        ->with('success','Post deleted successfully');
    }
}
