@extends('dashboard.layout.main')
@section('container')
<br />
<center>
    <h1>Data Produk</h1>
</center>
@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
    {{ session('pesan') }}
</div>
@endif
<a href="/produk-dashboard/create" class="btn btn-primary">Tambah Data</a>
<table class="table">
    <thead>
        <tr class="text-nowrap">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Gambar</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga</th>
            <th scope="col">Publish Date</th>
        </tr>
    </thead>
    @foreach ($produks as $produk)
    <tbody>
        <tr class="text-nowrap">
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $produk->nama }}</td>
            <td class="col-md-2"><img src="{{ Storage::url($produk->image)}}" class="image-thumbnail img-fluid" style="max-width: 100%;"></td>
            <td class="col-md-2">{!! $produk->deskripsi !!}</td>
            <td class="col-md-2">{{ $produk->harga }}</td>
            <td class="col-md-2">{{ date('d F Y:i:s', strtotime($produk->created_at)) }}</td>
            <td class="col-md-2">
                <a href="/produk-dashboard/{{ $produk->id }}/edit" class="btn btn-warning">Edit</a>
                <form action="/produk-dashboard/{{ $produk->id }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit" onclick="return confirm
                    ('Yakin akan menghapus data ?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $produks->links() }}
@endsection
