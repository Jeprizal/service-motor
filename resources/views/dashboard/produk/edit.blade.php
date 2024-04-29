@extends('dashboard.layout.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Edit Produk</h3>
    <form action="/produk-dashboard/{{$produk->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 text-center">
            <!-- <label for="image" class="form-label">Thumbnail</label> -->
            @if($produk->image)
            <img src="{{ Storage::url($produk->image)}}" class="image-thumbnail" alt="thumbnail" style="width:50%">
            @else
            <span class="badge badge-danger">Belum ada Thumbnail</span>
            @endif            
            <input type="file" id="image" name="image" class=" form-control @error('image') is-invalid @enderror" accepts="image/*">
        </div>
        @error('image')
                {{$message}}
            @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Input nama" value="{{old('nama',$produk->nama)}}">
            @error('nama')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi </label>
            <textarea name="deskripsi" id="deskripsi" rows="2" width="500x" class="form-control" required>{{old('deskripsi',$produk->deskripsi)}} </textarea>
            @error('deskripsi')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Input harga" value="{{old('harga',$produk->harga)}}">
            @error('harga')
                {{$message}}
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Update</button>
    </div>
    </form>
        </div>
    </div>
    <script src="/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#deskripsi' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection