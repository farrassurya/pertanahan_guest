<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator; // PASTIKAN INI ADA
use Illuminate\Http\Request;
use App\Models\JenisPenggunaan;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return view ('guest.index');

        return view('pages.guest.home', [
            'oldInput' => $request->session()->get('_old_input', [])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penggunaan' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ], [
            'nama_penggunaan.required' => 'Nama Penggunaan wajib diisi',
            'nama_penggunaan.string' => 'Nama Penggunaan harus berupa teks',
            'nama_penggunaan.max' => 'Nama Penggunaan maksimal 255 karakter',
            'keterangan.string' => 'Keterangan harus berupa teks'
        ]);

        if ($validator->fails()) {
            return redirect()->route('index')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terjadi kesalahan dalam pengisian form.');
        }

        try {
            JenisPenggunaan::create([
                'nama_penggunaan' => $request->nama_penggunaan,
                'keterangan' => $request->keterangan
            ]);

            return redirect()->route('index')
                ->with('success', 'Data Jenis Penggunaan berhasil disimpan!');

        } catch (\Exception $e) {
            return redirect()->route('index')
                ->withInput()
                ->with('error', 'Terjadi kesalahan server. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
