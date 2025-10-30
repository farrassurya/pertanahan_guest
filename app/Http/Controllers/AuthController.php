<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Process login (kept simple per project requirements)
     */
    public function login(Request $request)
    {
       $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:3',
    ], [
        'email.required' => 'Email wajib diisi!',
        'email.email' => 'Format email tidak valid',
        'password.required' => 'Password wajib diisi!',
        'password.min' => 'Password minimal 3 karakter!',
    ]);
    $credentials = $request->only('email','password');
    $remember = $request->filled('remember');

    if (Auth::attempt($credentials, $remember)) {
        // Authentication passed...
        $request->session()->regenerate();
        $user = Auth::user();
        return redirect()->route('guest.home')->with('success', "Selamat datang, {$user->email}!");
    }

    return back()->withErrors([
        'email' => 'Kombinasi dari Email/Password Anda Salah atau Akun  Anda Belum Terdaftar.',
    ])->withInput($request->only('email'));
    }

    /**
     * Log the user out (invalidate session)
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('guest.home');
    }

    /**
     * Show registration form
     */
    public function registerForm()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created user (signup)
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            // password must be at least 8 chars and start with an uppercase letter
            'password' => ['required','string','min:8','confirmed','regex:/^[A-Z].*/'],
        ], [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Password konfirmasi tidak cocok',
            'password.regex' => 'Password harus diawali huruf besar (A-Z)!',
        ]);

        $user = User::create([
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Do NOT auto-login the user after registration. Redirect to the login page
        // with a friendly success message asking them to sign in.
        return redirect()->route('auth.index')->with('success', "Akun berhasil dibuat untuk: {$user->name}. Silakan login.");
    }

    /**
     * List users (simple admin/management view)
     */
    public function users()
    {
    // show users ordered ascending by id (smallest id at the top)
    $users = User::orderBy('id', 'asc')->paginate(12);
        return view('auth.users', compact('users'));
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.edit', compact('user'));
    }

    /**
     * Update user
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
            // password optional, but if present must be min 8 and start with uppercase
            'password' => ['nullable','string','min:8','confirmed','regex:/^[A-Z].*/'],
        ], [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Password konfirmasi tidak cocok',
            'password.regex' => 'Password harus diawali huruf besar (A-Z)!',
        ]);

        $user->name = $validated['name'] ?? $user->name;
        $user->email = $validated['email'];
        if(!empty($validated['password'])){
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        return redirect()->route('auth.users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove user
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('auth.users')->with('success', 'User deleted successfully.');
    }
}
