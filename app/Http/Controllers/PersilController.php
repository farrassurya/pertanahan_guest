<?php
namespace App\Http\Controllers;

use App\Models\Persil;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['rt', 'rw'];

        $query = Persil::with('pemilik')
            ->filter($request, $filterableColumns);

        // Searchable columns: kode_persil, penggunaan, pemilik.nama
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        $persil = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();

        // Get unique RT and RW values for filter dropdown
        $rtList = Persil::whereNotNull('rt')->distinct()->pluck('rt')->sort()->values();
        $rwList = Persil::whereNotNull('rw')->distinct()->pluck('rw')->sort()->values();

        return view('pages.persil.index', compact('persil', 'rtList', 'rwList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga = Warga::all(); // Untuk dropdown pemilik
        return view('pages.persil.create', compact('warga'));
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
            'media_files'      => 'nullable|array|max:2',
            'media_files.*'    => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:1024',
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
            'media_files.max'           => 'Maksimal 2 file',
            'media_files.*.mimes'       => 'File harus: jpg, jpeg, png, pdf, doc, docx, xls, xlsx',
            'media_files.*.max'         => 'Ukuran file maksimal 1MB (1024KB)',
        ]);

        try {
            // Simpan data persil
            $persil = Persil::create(array_merge(
                $request->only([
                    'kode_persil', 'pemilik_warga_id', 'luas_m2',
                    'penggunaan', 'alamat_lahan', 'rt', 'rw'
                ]),
                ['created_by' => auth()->id()]
            ));

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
                            'ref_table'  => 'persil',
                            'ref_id'     => $persil->persil_id,
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

            return redirect()->route('pages.persil.index')
                ->with('success', 'Data persil berhasil disimpan!');
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
        $persil = Persil::with('pemilik')->findOrFail($id);
        return view('pages.persil.show', compact('persil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persil = Persil::findOrFail($id);
        $warga  = Warga::all();
        return view('pages.persil.edit', compact('persil', 'warga'));
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
            'media_files'      => 'nullable|array|max:2',
            'media_files.*'    => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:1024',
        ]);

        // Validasi total file (existing + new)
        if ($request->hasFile('media_files')) {
            $existingCount = Media::where('ref_table', 'persil')
                ->where('ref_id', $persil->persil_id)
                ->count();
            $newCount = count($request->file('media_files'));

            if (($existingCount + $newCount) > 2) {
                return redirect()->back()
                    ->withErrors(['media_files' => 'Total file maksimal 2. Saat ini sudah ada ' . $existingCount . ' file. Hapus file lama terlebih dahulu.'])
                    ->withInput();
            }
        }

        try {
            $persil->update($request->only([
                'kode_persil', 'pemilik_warga_id', 'luas_m2',
                'penggunaan', 'alamat_lahan', 'rt', 'rw'
            ]));

            // Handle additional file uploads
            if ($request->hasFile('media_files')) {
                // Pastikan folder media ada
                $mediaPath = storage_path('app/public/media');
                if (!is_dir($mediaPath)) {
                    mkdir($mediaPath, 0755, true);
                }

                $currentMaxOrder = Media::where('ref_table', 'persil')
                    ->where('ref_id', $persil->persil_id)
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
                            'ref_table'  => 'persil',
                            'ref_id'     => $persil->persil_id,
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

            // Hapus semua media terkait
            $media = Media::where('ref_table', 'persil')
                ->where('ref_id', $persil->persil_id)
                ->get();

            foreach ($media as $m) {
                Storage::delete('public/media/' . $m->file_name);
                $m->delete();
            }

            $persil->delete();

            return redirect()->route('pages.persil.index')
                ->with('success', 'Data persil berhasil dihapus!');
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
