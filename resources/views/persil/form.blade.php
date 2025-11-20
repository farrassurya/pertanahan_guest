

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap');

    .persil-form-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(184, 125, 26, 0.12);
        border: 2px solid #f5e3c2;
        max-width: 950px;
        margin: 2rem auto;
        padding: 2rem 2.5rem;
        font-family: 'Montserrat', Arial, sans-serif;
    }

    .persil-form-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: #222;
        margin-bottom: 2rem;
        letter-spacing: 0.5px;
        text-align: left;
        font-family: 'Montserrat', Arial, sans-serif;
    }

    .persil-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.3rem 2rem;
    }

    .persil-form-group {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        font-weight: 700;
        color: #222;
        margin-bottom: 0.4rem;
        font-size: 1rem;
        font-family: 'Montserrat', Arial, sans-serif;
    }

    .form-control, .form-select {
        font-size: 1rem;
        padding: 0.65rem 1rem;
        border-radius: 6px;
        border: 1px solid #ddd;
        background: #fafafa;
        font-family: 'Montserrat', Arial, sans-serif;
        transition: all 0.2s;
    }

    .form-control:focus, .form-select:focus {
        border-color: #b87d1a;
        box-shadow: 0 0 0 3px rgba(184, 125, 26, 0.1);
        outline: none;
        background: #fff;
    }

    .btn-gold {
        background: #b87d1a;
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 6px;
        padding: 0.65rem 1.8rem;
        font-size: 1.05rem;
        margin-left: 0.6rem;
        transition: all 0.2s;
        font-family: 'Montserrat', Arial, sans-serif;
        cursor: pointer;
    }

    .btn-gold:hover {
        background: #a36b14;
        color: #fff;
        transform: translateY(-1px);
    }

    .btn-reset {
        background: #555;
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 6px;
        padding: 0.65rem 1.8rem;
        font-size: 1.05rem;
        transition: all 0.2s;
        font-family: 'Montserrat', Arial, sans-serif;
        cursor: pointer;
    }

    .btn-reset:hover {
        background: #333;
        color: #fff;
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        .persil-form-card {
            padding: 1.5rem 1rem;
            max-width: 95vw;
        }
        .persil-form-title {
            font-size: 1.3rem;
        }
        .persil-form-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }

    .alert {
        padding: 1rem 1.25rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-family: 'Montserrat', Arial, sans-serif;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .alert-success {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
    }
    .alert-danger {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
    }
    .alert i {
        font-size: 1.2rem;
    }
    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        font-family: 'Montserrat', Arial, sans-serif;
    }
    .is-invalid {
        border-color: #dc3545 !important;
        background-color: #fff5f5 !important;
    }
</style>




<div class="persil-form-card">
    {{-- Alert Success --}}
    @if (session('success'))
        <div class="alert alert-success">
            <i class="fa fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Alert Error --}}
    @if (session('error'))
        <div class="alert alert-danger">
            <i class="fa fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <i class="fa fa-exclamation-triangle"></i>
            <div>
                <strong>Terdapat kesalahan:</strong>
                <ul style="margin: 0.5rem 0 0 1.5rem; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
        <div class="persil-form-title" style="margin-bottom:0;">{{ isset($persil) ? 'EDIT DATA PERSIL' : 'TAMBAH DATA PERSIL' }}</div>
        <a href="{{ route('pages.persil.index') }}" class="btn" style="background:#6c757d; color:#fff; border:none; padding:0.5rem 1.3rem; border-radius:6px; text-decoration:none; font-weight:700; font-family:'Montserrat',Arial,sans-serif; font-size:1rem;">KEMBALI</a>
    </div>
    <form action="{{ isset($persil) ? route('pages.persil.update', $persil->persil_id) : route('pages.persil.store') }}" method="POST">
        @csrf
        @if(isset($persil))
            @method('PUT')
        @endif

        <div class="persil-form-grid">
            <div class="persil-form-group">
                <label for="kode_persil" class="form-label">Kode Persil <span style="color:#b87d1a">*</span></label>
                <input type="text" name="kode_persil" id="kode_persil" class="form-control @error('kode_persil') is-invalid @enderror" required placeholder="Masukkan kode persil" value="{{ old('kode_persil', $persil->kode_persil ?? '') }}">
                @error('kode_persil')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="persil-form-group">
                <label for="pemilik_warga_id" class="form-label">Pemilik Warga <span style="color:#b87d1a">*</span></label>
                <select name="pemilik_warga_id" id="pemilik_warga_id" class="form-select @error('pemilik_warga_id') is-invalid @enderror" required>
                    <option value="">Pilih Pemilik Warga</option>
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}" {{ (old('pemilik_warga_id', $persil->pemilik_warga_id ?? '') == $w->warga_id) ? 'selected' : '' }}>{{ $w->nama }}</option>
                    @endforeach
                </select>
                @error('pemilik_warga_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="persil-form-group">
                <label for="luas_m2" class="form-label">Luas (m2) <span style="color:#b87d1a">*</span></label>
                <input type="number" step="0.01" name="luas_m2" id="luas_m2" class="form-control @error('luas_m2') is-invalid @enderror" required placeholder="Masukkan luas tanah" value="{{ old('luas_m2', $persil->luas_m2 ?? '') }}">
                @error('luas_m2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="persil-form-group">
                <label for="alamat_lahan" class="form-label">Alamat Lahan <span style="color:#b87d1a">*</span></label>
                <input type="text" name="alamat_lahan" id="alamat_lahan" class="form-control @error('alamat_lahan') is-invalid @enderror" required placeholder="Masukkan alamat lahan" value="{{ old('alamat_lahan', $persil->alamat_lahan ?? '') }}">
                @error('alamat_lahan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="persil-form-group" style="margin-top:1.3rem;">
            <label for="penggunaan" class="form-label">Penggunaan <span style="color:#b87d1a">*</span></label>
            <textarea name="penggunaan" id="penggunaan" class="form-control @error('penggunaan') is-invalid @enderror" rows="3" style="resize:vertical;" required placeholder="Masukkan penggunaan/deskripsi">{{ old('penggunaan', $persil->penggunaan ?? '') }}</textarea>
            @error('penggunaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="persil-form-grid" style="margin-top:1.3rem;">
            <div class="persil-form-group">
                <label for="rt" class="form-label">RT <span style="color:#b87d1a">*</span></label>
                <input type="text" name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror" required placeholder="RT" value="{{ old('rt', $persil->rt ?? '') }}">
                @error('rt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="persil-form-group">
                <label for="rw" class="form-label">RW <span style="color:#b87d1a">*</span></label>
                <input type="text" name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror" required placeholder="RW" value="{{ old('rw', $persil->rw ?? '') }}">
                @error('rw')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div style="margin-top:2.5rem; display:flex; justify-content:flex-end; gap:0.8rem;">
            <button type="submit" class="btn btn-gold">SIMPAN DATA</button>
            <button type="reset" class="btn btn-reset">RESET</button>
        </div>
    </form>
</div>

