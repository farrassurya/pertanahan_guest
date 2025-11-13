<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $warga = Warga::all();
        return view('pages.warga.index', compact('warga'));
    }

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_ktp'        => 'required|numeric|digits:16|unique:warga,no_ktp',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'agama'         => 'required|string|max:20',
            'pekerjaan'     => 'nullable|string|max:50',
            'telp'          => 'nullable|numeric|digits_between:10,13',
            'email'         => 'required|email|unique:warga,email', // GANTI alamat JADI email
        ], [
            'no_ktp.required'        => 'No KTP wajib diisi',
            'no_ktp.numeric'         => 'No KTP harus berupa angka',
            'no_ktp.digits'          => 'No KTP harus 16 digit',
            'no_ktp.unique'          => 'No KTP sudah terdaftar',
            'nama.required'          => 'Nama wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'agama.required'         => 'Agama wajib dipilih',
            'email.required'         => 'Email wajib diisi',        // TAMBAH INI
            'email.email'            => 'Format email tidak valid', // TAMBAH INI
            'email.unique'           => 'Email sudah terdaftar',    // TAMBAH INI
        ]);

        try {
            Warga::create($validated);
            return redirect()->route('pages.warga.index')
                ->with('success', 'Data warga berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambah data!')
                ->withInput();
        }
    }

    public function show(Warga $warga)
    {
        return view('pages.warga.show', compact('warga'));
    }

    public function edit(Warga $warga)
    {
        return view('pages.warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_ktp'        => 'required|numeric|digits:16|unique:warga,no_ktp,' . $id . ',warga_id',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'agama'         => 'required|string|max:20',
            'pekerjaan'     => 'nullable|string|max:50',
            'telp'          => 'nullable|numeric|digits_between:10,13',
            'email'         => 'required|email|unique:warga,email,' . $id . ',warga_id', // GANTI alamat JADI email
        ]);

        try {
            $warga = Warga::findOrFail($id);
            $warga->update($validated);
            return redirect()->route('pages.warga.index')
                ->with('success', 'Data warga berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal update data!')
                ->withInput();
        }
    }

    public function destroy(Warga $warga)
    {
        $warga->delete();

        return redirect()->route('pages.warga.index')
            ->with('success', 'Data warga berhasil dihapus.');
    }
}
