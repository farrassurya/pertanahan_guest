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
        return view('pages.auth.login');
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
        return redirect()->route('pages.guest.home')->with('success', "Selamat datang, {$user->email}!");
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

        return redirect()->route('pages.guest.home');
    }

    /**
     * Show registration form
     */
    public function registerForm()
    {
        return view('pages.auth.register');
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
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'role.in' => 'Role tidak valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Password konfirmasi tidak cocok',
            'password.regex' => 'Password harus diawali huruf besar (A-Z)!',
            'profile_photo.image' => 'File harus berupa gambar!',
            'profile_photo.mimes' => 'Foto harus format: jpeg, png, jpg',
            'profile_photo.max' => 'Ukuran foto maksimal 1MB',
        ]);

        // Semua user baru otomatis mendapat role 'warga'
        $role = 'warga';

        // Handle profile photo upload
        $profilePhotoPath = null;
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $user = User::create([
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $role,
            'profile_photo' => $profilePhotoPath,
        ]);

        // Do NOT auto-login the user after registration. Redirect to the login page
        // with a friendly success message asking them to sign in.
        return redirect()->route('pages.auth.index')->with('success', "Akun berhasil dibuat untuk: {$user->name}. Silakan login.");
    }

    /**
     * List users (simple admin/management view)
     */
    public function users()
    {
    // show users ordered ascending by id (smallest id at the top)
    $users = User::orderBy('id', 'asc')->paginate(12);
        return view('pages.auth.users', compact('users'));
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
    return view('pages.auth.edit', compact('user'));
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
            'role' => ['required', 'in:operator,warga'],
            // password optional, but if present must be min 8 and start with uppercase
            'password' => ['nullable','string','min:8','confirmed','regex:/^[A-Z].*/'],
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'role.required' => 'Role wajib dipilih!',
            'role.in' => 'Role tidak valid!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Password konfirmasi tidak cocok',
            'password.regex' => 'Password harus diawali huruf besar (A-Z)!',
            'profile_photo.image' => 'File harus berupa gambar!',
            'profile_photo.mimes' => 'Foto harus format: jpeg, png, jpg',
            'profile_photo.max' => 'Ukuran foto maksimal 1MB',
        ]);

        $user->name = $validated['name'] ?? $user->name;
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        if(!empty($validated['password'])){
            $user->password = Hash::make($validated['password']);
        }

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo) {
                \Storage::disk('public')->delete($user->profile_photo);
            }
            $user->profile_photo = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $user->save();

        return redirect()->route('pages.auth.users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove user
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pages.auth.users')->with('success', 'User deleted successfully.');
    }

    /**
     * Show profile edit form for logged in user
     */
    public function profile()
    {
        $user = auth()->user();
        return view('pages.auth.profile', compact('user'));
    }

    /**
     * Update profile for logged in user
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable','string','min:8','confirmed','regex:/^[A-Z].*/'],
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Password konfirmasi tidak cocok',
            'password.regex' => 'Password harus diawali huruf besar (A-Z)!',
            'profile_photo.image' => 'File harus berupa gambar!',
            'profile_photo.mimes' => 'Foto harus format: jpeg, png, jpg',
            'profile_photo.max' => 'Ukuran foto maksimal 1MB',
        ]);

        $user->name = $validated['name'] ?? $user->name;
        $user->email = $validated['email'];

        // Password optional
        if(!empty($validated['password'])){
            $user->password = Hash::make($validated['password']);
        }

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo) {
                \Storage::disk('public')->delete($user->profile_photo);
            }
            $user->profile_photo = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        // Role tidak bisa diubah oleh user sendiri - tetap seperti semula
        // Hanya operator yang bisa mengubah role via halaman user management

        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
