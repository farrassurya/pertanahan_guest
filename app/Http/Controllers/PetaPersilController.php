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
            'files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $petaPersil = PetaPersil::create($validated);

        // Handle file uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $filename = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->storeAs('media', $filename, 'public');

                Media::create([
                    'ref_table' => 'peta_persil',
                    'ref_id' => $petaPersil->peta_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('pages.peta-persil.index')
            ->with('success', 'Peta persil berhasil ditambahkan!');
    }

    public function show($id)
    {
        $petaPersil = PetaPersil::with(['persil', 'media'])->findOrFail($id);

        return view('pages.peta_persil.show', compact('petaPersil'));
    }

    public function edit($id)
    {
        $petaPersil = PetaPersil::with('media')->findOrFail($id);
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
            'files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $petaPersil->update($validated);

        // Handle new file uploads
        if ($request->hasFile('files')) {
            $existingCount = Media::where('ref_table', 'peta_persil')
                ->where('ref_id', $petaPersil->peta_id)
                ->count();

            foreach ($request->file('files') as $index => $file) {
                $filename = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->storeAs('media', $filename, 'public');

                Media::create([
                    'ref_table' => 'peta_persil',
                    'ref_id' => $petaPersil->peta_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order' => $existingCount + $index + 1,
                ]);
            }
        }

        return redirect()->route('pages.peta-persil.show', $petaPersil->peta_id)
            ->with('success', 'Peta persil berhasil diupdate!');
    }

    public function destroy($id)
    {
        $petaPersil = PetaPersil::findOrFail($id);

        // Delete all associated files
        $media = Media::where('ref_table', 'peta_persil')
            ->where('ref_id', $petaPersil->peta_id)
            ->get();

        foreach ($media as $m) {
            if (Storage::disk('public')->exists('media/' . $m->file_name)) {
                Storage::disk('public')->delete('media/' . $m->file_name);
            }
            $m->delete();
        }

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

    public function deleteMedia($id)
    {
        $media = Media::findOrFail($id);

        // Delete file from storage
        if (Storage::disk('public')->exists('media/' . $media->file_name)) {
            Storage::disk('public')->delete('media/' . $media->file_name);
        }

        // Get the ref_id before deleting
        $petaId = $media->ref_id;

        $media->delete();

        return redirect()->back()->with('success', 'File berhasil dihapus!');
    }
}
