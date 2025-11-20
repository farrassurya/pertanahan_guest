<div class="row g-3">
    <div class="col-md-6">
        <label for="file_url" class="form-label">File URL</label>
        <input type="text" name="file_url" id="file_url" class="form-control" value="{{ old('file_url', $media->file_url ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label for="caption" class="form-label">Caption</label>
        <input type="text" name="caption" id="caption" class="form-control" value="{{ old('caption', $media->caption ?? '') }}">
    </div>
    <div class="col-md-4">
        <label for="mime_type" class="form-label">Mime Type</label>
        <input type="text" name="mime_type" id="mime_type" class="form-control" value="{{ old('mime_type', $media->mime_type ?? '') }}">
    </div>
    <div class="col-md-4">
        <label for="sort_order" class="form-label">Sort Order</label>
        <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $media->sort_order ?? 0) }}">
    </div>
</div>
