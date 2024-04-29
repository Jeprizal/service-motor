@extends('member.layout.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="py-3 text-center">Edit your profile</h3>
    <form action="/settings-member" method="POST" endctype="multipart/form-data">
    @method('PUT')    
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{old('name',$users->name)}}">
            @error('name')
                {{$message}}
            @enderror
            </div>
            <div class="mb-3">
            <label for="level" class="form-label">Status</label>
            <input type="text" class="form-control @error('level') is-invalid @enderror" id="level" name="level"  value="{{old('level',$settings->level)}}" readonly>
            @error('level')
                {{$message}}
            @enderror
            </div>
            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value="{{old('level',$settings->email)}}" readonly>
            @error('level')
                {{$message}}
            @enderror
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  value="{{old('password',$settings->password)}}" readonly>
            @error('level')
                {{$message}}
            @enderror
            </div>
        <button class="btn btn-success" type="submit">Update</button>
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