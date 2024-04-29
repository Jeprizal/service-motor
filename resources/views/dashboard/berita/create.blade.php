@extends('dashboard.layout.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Berita baru</h3>
    <form action="/berita-dashboard" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">JUDUL</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Input title" value="{{old('title')}}">
            @error('title')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Thumbnail</label>
            <input type="file" id="image" name="image" class=" form-control @error('image') is-invalid @enderror" accepts="image/*" value="{{old('image')}}">
        </div>
        @error('image')
                {{$message}}
            @enderror
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" name="kategori_id" aria-label="Default select example">
                @foreach ($kategoris as $kategori)
                    <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Isi</label>
            <textarea name="body" id="body" rows="2" width="500x" class="form-control" required>{{old('body')}} </textarea>
            @error('body')
                {{$message}}
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
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection