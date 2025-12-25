<?php

namespace App\Http\Controllers;

use App\Models\SengketaPersil;
use App\Models\Persil;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SengketaPersilController extends Controller
{
    public function index(Request $request)
    {
        $filterableColumns = ['status', 'persil_id'];

        $query = SengketaPersil::with('persil')
            ->filter($request, $filterableColumns);

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        $sengketas = $query->latest()->paginate(9)->withQueryString();
        $persils = Persil::orderBy('kode_persil')->get();

        return view('pages.sengketa_persil.index', compact('sengketas', 'persils'));
    }

    public function create()
    {
        $persils = Persil::orderBy('kode_persil')->get();
        return view('pages.sengketa_persil.create', compact('persils'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'pihak_1' => 'required|string|max:100',
            'pihak_2' => 'required|string|max:100',
            'kronologi' => 'required|string',
            'status' => 'required|in:Proses,Mediasi,Pengadilan,Selesai',
            'penyelesaian' => 'nullable|string',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ], [
            'persil_id.required' => 'Persil wajib dipilih',
            'pihak_1.required' => 'Pihak 1 wajib diisi',
            'pihak_2.required' => 'Pihak 2 wajib diisi',
            'kronologi.required' => 'Kronologi wajib diisi',
            'status.required' => 'Status wajib dipilih',
            'media_files.*.max' => 'Ukuran file maksimal 2MB',
        ]);

        try {
            DB::beginTransaction();

            $sengketa = SengketaPersil::create($validated);

            // Handle file uploads
            if ($request->hasFile('media_files')) {
                $sortOrder = 1;
                foreach ($request->file('media_files') as $file) {
                    $fileName = time() . '_' . $sortOrder . '_' . $file->getClientOriginalName();
                    $file->storeAs('media', $fileName, 'public');

                    Media::create([
                        'ref_table' => 'sengketa_persil',
                        'ref_id' => $sengketa->sengketa_id,
                        'file_name' => $fileName,
                        'mime_type' => $file->getMimeType(),
                        'file_size' => $file->getSize(),
                        'sort_order' => $sortOrder,
                    ]);

                    $sortOrder++;
                }
            }

            DB::commit();
            return redirect()->route('pages.sengketa-persil.index')
                ->with('success', 'Data sengketa berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambah data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $sengketa = SengketaPersil::with('persil')->findOrFail($id);
        $media = Media::where('ref_table', 'sengketa_persil')
            ->where('ref_id', $id)
            ->orderBy('sort_order')
            ->get();

        return view('pages.sengketa_persil.show', compact('sengketa', 'media'));
    }

    public function edit($id)
    {
        $sengketa = SengketaPersil::findOrFail($id);
        $persils = Persil::orderBy('kode_persil')->get();
        return view('pages.sengketa_persil.edit', compact('sengketa', 'persils'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'pihak_1' => 'required|string|max:100',
            'pihak_2' => 'required|string|max:100',
            'kronologi' => 'required|string',
            'status' => 'required|in:Proses,Mediasi,Pengadilan,Selesai',
            'penyelesaian' => 'nullable|string',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ], [
            'persil_id.required' => 'Persil wajib dipilih',
            'pihak_1.required' => 'Pihak 1 wajib diisi',
            'pihak_2.required' => 'Pihak 2 wajib diisi',
            'kronologi.required' => 'Kronologi wajib diisi',
            'status.required' => 'Status wajib dipilih',
            'media_files.*.max' => 'Ukuran file maksimal 2MB',
        ]);

        try {
            DB::beginTransaction();

            $sengketa = SengketaPersil::findOrFail($id);
            $sengketa->update($validated);

            // Handle new file uploads
            if ($request->hasFile('media_files')) {
                $existingCount = Media::where('ref_table', 'sengketa_persil')
                    ->where('ref_id', $id)
                    ->count();

                $sortOrder = $existingCount + 1;
                foreach ($request->file('media_files') as $file) {
                    $fileName = time() . '_' . $sortOrder . '_' . $file->getClientOriginalName();
                    $file->storeAs('media', $fileName, 'public');

                    Media::create([
                        'ref_table' => 'sengketa_persil',
                        'ref_id' => $id,
                        'file_name' => $fileName,
                        'mime_type' => $file->getMimeType(),
                        'file_size' => $file->getSize(),
                        'sort_order' => $sortOrder,
                    ]);

                    $sortOrder++;
                }
            }

            DB::commit();
            return redirect()->route('pages.sengketa-persil.show', $id)
                ->with('success', 'Data sengketa berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $sengketa = SengketaPersil::findOrFail($id);

            // Delete all media files
            $media = Media::where('ref_table', 'sengketa_persil')
                ->where('ref_id', $id)
                ->get();

            foreach ($media as $m) {
                Storage::disk('public')->delete('media/' . $m->file_name);
                $m->delete();
            }

            $sengketa->delete();

            DB::commit();
            return redirect()->route('pages.sengketa-persil.index')
                ->with('success', 'Data sengketa berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function deleteMedia($mediaId)
    {
        try {
            $media = Media::findOrFail($mediaId);
            Storage::disk('public')->delete('media/' . $media->file_name);
            $media->delete();

            return redirect()->back()->with('success', 'File berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus file: ' . $e->getMessage());
        }
    }
}
