@extends('dashboard.layout.main')
@section('container')
    <br />
    <center>
        <h1>Payment</h1>
    </center>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="/payment/create" class="btn btn-primary">Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Number</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        @foreach ($payment as $item)
            <tbody>
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->number }}</td>
                    <td>
                        <a href="/payment/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    {{-- {{ $payment->links() }} --}}
@endsection
