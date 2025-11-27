<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JenisPenggunaan;

class JenisPenggunaanController extends Controller
{
    public function index(Request $request)
    {
        $filterableColumns = [];

        $query = JenisPenggunaan::query()
            ->filter($request, $filterableColumns);

        // Searchable column: nama_penggunaan
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        $items = $query->orderBy('id', 'asc')->paginate(9)->withQueryString();
        return view('pages.jenis_penggunaan.index', compact('items'));
    }

    public function create()
    {
        return view('pages.jenis_penggunaan.create');
    }

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
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terjadi kesalahan dalam pengisian form.');
        }

        JenisPenggunaan::create([
            'nama_penggunaan' => $request->nama_penggunaan,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('pages.jenis-penggunaan.index')->with('success', 'Data Jenis Penggunaan berhasil disimpan!');
    }

    public function edit($id)
    {
        $item = JenisPenggunaan::findOrFail($id);
        return view('pages.jenis_penggunaan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_penggunaan' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ], [
            'nama_penggunaan.required' => 'Nama Penggunaan wajib diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pages.jenis-penggunaan.edit', $id)
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terjadi kesalahan dalam pengisian form.');
        }

        $item = JenisPenggunaan::findOrFail($id);
        $item->update([
            'nama_penggunaan' => $request->nama_penggunaan,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('pages.jenis-penggunaan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = JenisPenggunaan::findOrFail($id);
        $item->delete();

        return redirect()->route('pages.jenis-penggunaan.index')->with('success', 'Data berhasil dihapus!');
    }
}
