@extends('dashboard.layout.main')
@section('container')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Entry Data Layanan</h3>
            <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" id="id" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" placeholder="Service Mesin" value="{{ old('namnamae') }}">
                    @error('nama')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                        name="image">
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="body" rows="5" width="500x" class="form-control" required>{{ old('deskripsi') }} </textarea>
                    @error('deskripsi')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="email"
                        name="harga" placeholder="Rp 15.000,-" value="{{ old('harga') }}">
                    @error('harga')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Status</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_open" value="open"
                            {{ old('status') == 'open' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_open">Open</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_close" value="close"
                            {{ old('status') == 'close' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_close">Close</label>
                    </div>
                    @error('status')
                        {{ $message }}
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
        </div>
        </form>
    </div>
    </div>
    <script src="/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
