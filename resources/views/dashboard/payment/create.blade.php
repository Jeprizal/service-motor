@extends('dashboard.layout.main')
@section('container')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Entri Data Layanan</h3>
            <form action="{{ route('payment.store') }}" method="POST">
                @csrf
                <input type="text" name="id" id="id" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Bank BCA" value="{{ old('name') }}">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Number</label>
                    <input type="number" class="form-control @error('nubmer') is-invalid @enderror" id="email"
                        name="number" placeholder="155683190" value="{{ old('number') }}">
                    @error('number')
                        {{ $message }}
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
        </div>
        </form>
    </div>
    </div>
@endsection
