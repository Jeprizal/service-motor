@extends('layout.main')

@section('container')
    <div class="landing-page">
        <div class="content">
            <div class="container">
                <div class="info">
                    <h1>Layanan Service Motor Anda</h1>
                    <p>Temukan layanan dan produk kami untuk menjaga motor Anda tetap berjalan lancar.</p>
                    {{-- <button>Temukan Sekarang</button> --}}
                    <a href="{{ route('login') }}"><button>Temukan Sekarang</button></a>
                </div>
                <div class="image">
                    <img src="../uploads/logo.png">
                </div>
            </div>
        </div>
    </div>
@endsection
