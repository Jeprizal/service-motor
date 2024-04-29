@extends('dashboard.layout.main')
@section('container')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Entri Data User</h3>
    <form action="/user-dashboard" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your name babe" value="{{old('name')}}">
            @error('name')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label> <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="level" id="inlineRadio1" value="ADMIN" {{old('level')}} checked>
                <label class="form-check-label" for="inlineRadio1">ADMIN</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="level" id="inlineRadio2" value="MEMBER" {{old('level')}}>
                <label class="form-check-label" for="inlineRadio2">MEMBER</label>
              </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="example@gmail.com" value="{{old('email')}}">
            @error('email')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password" value="{{old('password')}}">
            @error('email')
                {{$message}}
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </div>
    </form>
        </div>
    </div>
@endsection