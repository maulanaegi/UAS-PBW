<form action="{{ route('upload.foto') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="Foto_Identitas" id="Foto_Identitas" accept="image/*">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>

@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@if (session('file'))
    <div class="mt-3">
        <p>Foto yang diunggah:</p>
        <img src="{{ asset('storage/' . session('file')) }}" alt="Foto" width="150">
    </div>
@endif
