@extends('layout.main')
@section('container')
    <br />
    <br />
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center"> Please Sign up</h3>
            @if (session()->has('pesan'))
                <div class="alert alert-success" role="alert">
                    {{ session('pesan') }}
                </div>
            @endif
            <form action="/daftar" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Your name babe" value="{{ old('name') }}">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="example@gmail.com" value="{{ old('email') }}">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="password" value="{{ old('password') }}">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
        </div>
        </form>
    </div>
    </div>
@endsection
