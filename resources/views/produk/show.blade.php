@extends('layout.main')

@section('container')

<div class="row">
<div class="col-lg-8">
  <img src="{{ Storage::url($produk->image)}}" class="card-img-top" alt="...">
  <div class="card-body mt-3">
    <h1 class="card-title text-center">{!! $produk->nama !!}</h1>
    <p>{!! $produk->alamat !!}</p>
    <a href="/produk" class="btn btn-primary">Back</a>
  </div>
</div>
</div>
@endsection