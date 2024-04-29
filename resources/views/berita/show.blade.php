@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <img src="{{ asset('storage/' . $berita->image) }}" class="card-img-top" alt="...">
            <div class="card-body mt-3">
                <h1 class="card-title text-center">{!! $berita->title !!}</h1>
                <p>{!! $berita->body !!}</p>
                <a href="/berita" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
