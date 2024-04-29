@extends('dashboard.layout.main')
@section('container')
    <br />
    <center>
        <h1>Service</h1>
    </center>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="/layanan/create" class="btn btn-primary">Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Gambar</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        @foreach ($layanan as $item)
            <tbody>
                <tr class="col-md-2">
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td class="col-md-2"><img src="{{ Storage::url($item->image)}}" class="image-thumbnail img-fluid" style="max-width: 100%;"></td>
                    <td>Rp {{ $item->harga }},-</td>
                    <td>
                        @if ($item->status == 'open')
                            <span class="badge bg-success">{{ $item->status }}</span>
                        @elseif($item->status == 'close')
                            <span class="badge bg-danger">{{ $item->status }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="/layanan/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/layanan/{{ $item->id }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf

                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm
                ('Yakin akan menghapus data ?')
">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    {{-- {{ $payment->links() }} --}}
@endsection
