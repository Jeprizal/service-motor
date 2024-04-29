@extends('layout.main')

@section('container')
<div class="row mt-1">
<div class="row">

@if($produks->count()>0)
<div class="card mb-3">
    <img src="{{ Storage::url($produks[0]->image)}}" class="card-img-top" alt="..." width="1265"
    height="500">  <div class="card-body text-center">
    <h5 class="card-title">{{$produks[0]->nama}}</h5>
    <p class="card-text">Rp. {!! $produks[0]->harga!!}</p>
    <p class="card-text"><small class="text-muted">{{$produks[0]->created_at->diffForHumans() }}</small></p>
    <a href="/produk/{{$produks[0]->id}}" class="btn btn-primary">Readmore</a>
  </div>
</div>
@endif
</div>
<div class="row gx-5 ">
@foreach($produks->skip(1) as $produk)
<div class="col-lg-3">
<div class="card mb-3" style="width: 18rem;">
  <img src="{{ Storage::url($produk->image)}}" class="card-img-top" alt="..." width="285px" height="190px" >
  <div class="card-body">
    <h5 class="card-title">{{ $produk->nama}}</h5>
    <p class="card-text">Rp. {!!$produk->harga!!}</p>
    <a href="/produk/{{$produk->id}}" class="btn btn-primary">Readmore</a>
  </div>
</div>
</div>
@endforeach
</div>
</div>
@endsection
