<?php
namespace App\Http\Controllers;

use App\Models\DokumenPersil;
use App\Models\Persil;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenPersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['jenis_dokumen'];

        $query = DokumenPersil::with('persil.pemilik')
            ->filter($request, $filterableColumns);

        // Searchable columns
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        $dokumen = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();

        // Get unique jenis dokumen for filter dropdown
        $jenisList = DokumenPersil::whereNotNull('jenis_dokumen')
            ->distinct()
            ->pluck('jenis_dokumen')
            ->sort()
            ->values();

        return view('pages.dokumen_persil.index', compact('dokumen', 'jenisList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $persil = Persil::with('pemilik')->orderBy('kode_persil')->get();
        return view('pages.dokumen_persil.create', compact('persil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation Rules
        $request->validate([
            'persil_id'      => 'required|exists:persil,persil_id',
            'jenis_dokumen'  => 'required|string|max:100',
            'nomor'          => 'nullable|string|max:100',
            'keterangan'     => 'nullable|string',
            'media_files'    => 'nullable|array|max:5',
            'media_files.*'  => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ], [
            'persil_id.required'     => 'Persil wajib dipilih',
            'persil_id.exists'       => 'Persil tidak valid',
            'jenis_dokumen.required' => 'Jenis dokumen wajib diisi',
            'media_files.max'        => 'Maksimal 5 file',
            'media_files.*.mimes'    => 'File harus: jpg, jpeg, png, pdf, doc, docx, xls, xlsx',
            'media_files.*.max'      => 'Ukuran file maksimal 2MB (2048KB)',
        ]);

        try {
            // Simpan data dokumen persil
            $dokumen = DokumenPersil::create($request->only([
                'persil_id', 'jenis_dokumen', 'nomor', 'keterangan'
            ]));

            // Handle multiple file upload
            if ($request->hasFile('media_files')) {
                // Pastikan folder media ada
                $mediaPath = storage_path('app/public/media');
                if (!is_dir($mediaPath)) {
                    mkdir($mediaPath, 0755, true);
                }

                foreach ($request->file('media_files') as $index => $file) {
                    // Get mime type BEFORE moving file
                    $mimeType = $file->getMimeType();

                    // Generate unique filename
                    $originalName = $file->getClientOriginalName();
                    $fileName = time() . '_' . $index . '_' . str_replace(' ', '_', $originalName);

                    // Save file menggunakan move()
                    try {
                        $file->move($mediaPath, $fileName);

                        // Save to database
                        Media::create([
                            'ref_table'  => 'dokumen_persil',
                            'ref_id'     => $dokumen->dokumen_id,
                            'file_name'  => $fileName,
                            'mime_type'  => $mimeType,
                            'sort_order' => $index,
                        ]);
                    } catch (\Exception $e) {
                        // Log error but continue with other files
                        \Log::error('File upload failed: ' . $e->getMessage());
                    }
                }
            }

            return redirect()->route('pages.dokumen-persil.index')
                ->with('success', 'Data dokumen persil berhasil disimpan!');
        } catch (\Exception $e) {
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
        $dokumen = DokumenPersil::with('persil.pemilik')->findOrFail($id);

        // Get media files
        $media = Media::where('ref_table', 'dokumen_persil')
            ->where('ref_id', $dokumen->dokumen_id)
            ->orderBy('sort_order')
            ->get();

        return view('pages.dokumen_persil.show', compact('dokumen', 'media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokumen = DokumenPersil::findOrFail($id);
        $persil = Persil::with('pemilik')->orderBy('kode_persil')->get();

        // Get existing media
        $existingMedia = Media::where('ref_table', 'dokumen_persil')
            ->where('ref_id', $dokumen->dokumen_id)
            ->orderBy('sort_order')
            ->get();

        return view('pages.dokumen_persil.edit', compact('dokumen', 'persil', 'existingMedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dokumen = DokumenPersil::findOrFail($id);

        $request->validate([
            'persil_id'      => 'required|exists:persil,persil_id',
            'jenis_dokumen'  => 'required|string|max:100',
            'nomor'          => 'nullable|string|max:100',
            'keterangan'     => 'nullable|string',
            'media_files'    => 'nullable|array|max:5',
            'media_files.*'  => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        // Validasi total file (existing + new)
        if ($request->hasFile('media_files')) {
            $existingCount = Media::where('ref_table', 'dokumen_persil')
                ->where('ref_id', $dokumen->dokumen_id)
                ->count();
            $newCount = count($request->file('media_files'));

            if (($existingCount + $newCount) > 5) {
                return redirect()->back()
                    ->withErrors(['media_files' => 'Total file maksimal 5. Saat ini sudah ada ' . $existingCount . ' file. Hapus file lama terlebih dahulu.'])
                    ->withInput();
            }
        }

        try {
            $dokumen->update($request->only([
                'persil_id', 'jenis_dokumen', 'nomor', 'keterangan'
            ]));

            // Handle additional file uploads
            if ($request->hasFile('media_files')) {
                // Pastikan folder media ada
                $mediaPath = storage_path('app/public/media');
                if (!is_dir($mediaPath)) {
                    mkdir($mediaPath, 0755, true);
                }

                $currentMaxOrder = Media::where('ref_table', 'dokumen_persil')
                    ->where('ref_id', $dokumen->dokumen_id)
                    ->max('sort_order') ?? -1;

                foreach ($request->file('media_files') as $index => $file) {
                    // Get mime type BEFORE moving file
                    $mimeType = $file->getMimeType();

                    // Generate unique filename
                    $originalName = $file->getClientOriginalName();
                    $fileName = time() . '_' . $index . '_' . str_replace(' ', '_', $originalName);

                    // Save file menggunakan move()
                    try {
                        $file->move($mediaPath, $fileName);

                        // Save to database
                        Media::create([
                            'ref_table'  => 'dokumen_persil',
                            'ref_id'     => $dokumen->dokumen_id,
                            'file_name'  => $fileName,
                            'mime_type'  => $mimeType,
                            'sort_order' => $currentMaxOrder + $index + 1,
                        ]);
                    } catch (\Exception $e) {
                        // Log error but continue with other files
                        \Log::error('File upload failed: ' . $e->getMessage());
                    }
                }
            }

            return redirect()->route('pages.dokumen-persil.index')
                ->with('success', 'Data dokumen persil berhasil diupdate!');
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
            $dokumen = DokumenPersil::findOrFail($id);

            // Hapus semua media terkait
            $media = Media::where('ref_table', 'dokumen_persil')
                ->where('ref_id', $dokumen->dokumen_id)
                ->get();

            foreach ($media as $m) {
                Storage::delete('public/media/' . $m->file_name);
                $m->delete();
            }

            $dokumen->delete();

            return redirect()->route('pages.dokumen-persil.index')
                ->with('success', 'Data dokumen persil berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Delete specific media file
     */
    public function deleteMedia(string $mediaId)
    {
        try {
            $media = Media::findOrFail($mediaId);

            // Hapus file dari storage
            Storage::delete('public/media/' . $media->file_name);

            // Hapus record dari database
            $media->delete();

            return redirect()->back()
                ->with('success', 'File berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus file: ' . $e->getMessage());
        }
    }
}
