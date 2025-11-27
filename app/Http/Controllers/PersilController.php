<?php
namespace App\Http\Controllers;

use App\Models\Persil;
use App\Models\Warga;
use Illuminate\Http\Request;

class PersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Persil::with('pemilik');

        // Filter by RT
        if ($request->filled('rt')) {
            $query->where('rt', $request->rt);
        }

        // Filter by RW
        if ($request->filled('rw')) {
            $query->where('rw', $request->rw);
        }

        $persil = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();

        // Get unique RT and RW values for filter dropdown
        $rtList = Persil::whereNotNull('rt')->distinct()->pluck('rt')->sort()->values();
        $rwList = Persil::whereNotNull('rw')->distinct()->pluck('rw')->sort()->values();

        return view('persil.index', compact('persil', 'rtList', 'rwList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga = Warga::all(); // Untuk dropdown pemilik
        return view('persil.form', compact('warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation Rules
        $request->validate([
            'kode_persil'      => 'required|string|max:50|unique:persil,kode_persil',
            'pemilik_warga_id' => 'required|exists:warga,warga_id',
            'luas_m2'          => 'required|numeric|min:1',
            'penggunaan'       => 'required|string|max:100',
            'alamat_lahan'     => 'required|string',
            'rt'               => 'required|string|max:3',
            'rw'               => 'required|string|max:3',
        ], [
            'kode_persil.required'      => 'Kode persil wajib diisi',
            'kode_persil.unique'        => 'Kode persil sudah digunakan',
            'pemilik_warga_id.required' => 'Pemilik wajib dipilih',
            'pemilik_warga_id.exists'   => 'Pemilik tidak valid',
            'luas_m2.required'          => 'Luas tanah wajib diisi',
            'luas_m2.numeric'           => 'Luas tanah harus berupa angka',
            'luas_m2.min'               => 'Luas tanah minimal 1 m²',
            'penggunaan.required'       => 'Penggunaan lahan wajib diisi',
            'alamat_lahan.required'     => 'Alamat lahan wajib diisi',
            'rt.required'               => 'RT wajib diisi',
            'rw.required'               => 'RW wajib diisi',
        ]);

        try {
            // Simpan data
            Persil::create($request->all());

            // Redirect ke index dengan success message
            return redirect()->route('pages.persil.index')
                ->with('success', 'Data persil berhasil disimpan!');
        } catch (\Exception $e) {
            // Redirect back dengan error message
            return redirect()->back()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $persil = Persil::with('pemilik')->findOrFail($id);
        return view('persil.show', compact('persil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persil = Persil::findOrFail($id);
        $warga  = Warga::all();
        return view('persil.edit', compact('persil', 'warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $persil = Persil::findOrFail($id);

        $request->validate([
            'kode_persil'      => 'required|string|max:50|unique:persil,kode_persil,' . $id . ',persil_id',
            'pemilik_warga_id' => 'required|exists:warga,warga_id',
            'luas_m2'          => 'required|numeric|min:1',
            'penggunaan'       => 'required|string|max:100',
            'alamat_lahan'     => 'required|string',
            'rt'               => 'required|string|max:3',
            'rw'               => 'required|string|max:3',
        ]);

        try {
            $persil->update($request->all());
            return redirect()->route('pages.persil.index')
                ->with('success', 'Data persil berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal mengupdate data: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $persil = Persil::findOrFail($id);
            $persil->delete();

            return redirect()->route('pages.persil.index')
                ->with('success', 'Data persil berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
