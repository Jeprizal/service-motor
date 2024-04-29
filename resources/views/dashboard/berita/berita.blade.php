@extends('dashboard.layout.main')
@section('container')
<br/>
<center><h1>Data Berita</h1></center>
@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
 {{session('pesan')}}
</div>

@endif
<a href="/berita-dashboard/create" class="btn btn-primary">Tambah Data</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Judul</th>
        <th scope="col">Penulis</th>
        <th scope="col">Kategori</th>
        <th scope="col">Isi</th>
        <th scope="col">Publish Date</th>
        <th scope="col">Aksi</th>
    </tr>
</thead>
    @foreach ($beritas as $berita)
    <tbody>
    <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $berita->title }}</td>
        <td>{{ $berita->user->name }}</td>
        <td>{{ is_null($berita->kategori) ? '-' : $berita->kategori->nama }}</td>
        <td>{{ $berita->excerpt }}</td>
        <td>{{ $berita->created_at }}</td>
        <td>
            <a href="/berita-dashboard/{{ $berita->id }}/edit" class="btn btn-warning">Edit</a>
            <form action="/berita-dashboard/{{ $berita->id }}" method="POST" class="d-inline">
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
{{ $beritas->links()}}
@endsection
