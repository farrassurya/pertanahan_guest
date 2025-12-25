<?php

namespace App\Http\Controllers;

use App\Models\PetaPersil;
use App\Models\Persil;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetaPersilController extends Controller
{
    public function index(Request $request)
    {
        $query = PetaPersil::with('persil');

        // Filter
        if ($request->has('persil_id') && $request->persil_id != '') {
            $query->where('persil_id', $request->persil_id);
        }

        // Search
        if ($request->has('search') && $request->search != '') {
            $query->search($request->search);
        }

        $petaPersils = $query->orderBy('created_at', 'desc')->paginate(9);
        $persils = Persil::orderBy('kode_persil')->get();

        // Ambil semua peta untuk map view
        $allPetas = PetaPersil::with('persil')->get();

        return view('pages.peta_persil.index', compact('petaPersils', 'persils', 'allPetas'));
    }

    public function create()
    {
        $persils = Persil::orderBy('kode_persil')->get();
        return view('pages.peta_persil.create', compact('persils'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'geojson' => 'nullable|string',
            'panjang_m' => 'nullable|numeric|min:0',
            'lebar_m' => 'nullable|numeric|min:0',
        ]);

        $petaPersil = PetaPersil::create($validated);

        return redirect()->route('pages.peta-persil.index')
            ->with('success', 'Peta persil berhasil ditambahkan!');
    }

    public function show($id)
    {
        $petaPersil = PetaPersil::with('persil')->findOrFail($id);

        return view('pages.peta_persil.show', compact('petaPersil'));
    }

    public function edit($id)
    {
        $petaPersil = PetaPersil::findOrFail($id);
        $persils = Persil::orderBy('kode_persil')->get();

        return view('pages.peta_persil.edit', compact('petaPersil', 'persils'));
    }

    public function update(Request $request, $id)
    {
        $petaPersil = PetaPersil::findOrFail($id);

        $validated = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'geojson' => 'nullable|string',
            'panjang_m' => 'nullable|numeric|min:0',
            'lebar_m' => 'nullable|numeric|min:0',
        ]);

        $petaPersil->update($validated);

        return redirect()->route('pages.peta-persil.show', $petaPersil->peta_id)
            ->with('success', 'Peta persil berhasil diupdate!');
    }

    public function destroy($id)
    {
        $petaPersil = PetaPersil::findOrFail($id);
        $petaPersil->delete();

        return redirect()->route('pages.peta-persil.index')
            ->with('success', 'Peta persil berhasil dihapus!');
    }

    // API endpoint untuk mendapatkan data GeoJSON
    public function apiGetPetas()
    {
        $petas = PetaPersil::with('persil')->get();

        $features = [];
        foreach ($petas as $peta) {
            if ($peta->geojson) {
                $geoData = json_decode($peta->geojson, true);
                if ($geoData) {
                    $features[] = [
                        'type' => 'Feature',
                        'properties' => [
                            'peta_id' => $peta->peta_id,
                            'kode_persil' => $peta->persil->kode_persil ?? '-',
                            'alamat' => $peta->persil->alamat_lahan ?? '-',
                            'panjang_m' => $peta->panjang_m,
                            'lebar_m' => $peta->lebar_m,
                            'luas' => $peta->getLuas(),
                        ],
                        'geometry' => $geoData
                    ];
                }
            }
        }

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $features
        ]);
    }
}
