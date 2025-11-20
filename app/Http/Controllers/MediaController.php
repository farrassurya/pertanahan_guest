<?php
namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ref_table' => 'required|string',
            'ref_id' => 'required|integer',
            'file_url' => 'required|string',
            'caption' => 'nullable|string',
            'mime_type' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);
        $media = Media::create($validated);
        return back()->with('success', 'Media berhasil ditambahkan!');
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return back()->with('success', 'Media berhasil dihapus.');
    }
}
