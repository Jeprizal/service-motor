@extends('dashboard.layout.main')
@section('container')
    <br />
    <center>
        <h1>Data User</h1>
    </center>
    @if (session()->has('pesan'))
        <div class="alert alert-success" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    <a href="/user-dashboard/create" class="btn btn-primary">Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Level</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        @foreach ($users as $user)
            <tbody>
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->level }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>
                        <a href="/user-dashboard/{{ $user->id }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/user-dashboard/{{ $user->id }}" method="POST" class="d-inline">
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
    {{ $users->links() }}
@endsection
