@extends('dashboard.layout.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Produk baru</h3>
            <form action="/produk-dashboard" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Thumbnail</label>
                    <input type="file" id="image" name="image"
                        class=" form-control @error('image') is-invalid @enderror" accepts="image/*"
                        value="{{ old('image') }}">
                </div>
                @error('image')
                    {{ $message }}
                @enderror
                <div class="mb-3">
                    <label for="title" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" placeholder="Input nama" value="{{ old('nama') }}">
                    @error('nama')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                    <textarea name="deskripsi" id="alamat" rows="2" width="500x" class="form-control" required>{{ old('deskripsi') }} </textarea>
                    @error('deskripsi')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga" placeholder="Input harga" value="{{ old('harga') }}">
                    @error('harga')
                        {{ $message }}
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <script src="/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#alamat'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#tipe').on('change', function() {
                $.post({
                    data: {
                        id: this.value,
                        _token: `{{ csrf_token() }}`
                    },
                    url: '{{ url('/tipe-dashboard/data') }}',
                    dataType: 'json',
                    success: function(data) {
                        $('#tipe-deskripsi').text(data.deskripsi)
                    }
                })
            })
        })
    </script>
@endsection
