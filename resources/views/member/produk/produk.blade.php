@extends('member.layout.main')
@section('container')
<br/>
<center><h1>Data Produk</h1></center>
@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
 {{session('pesan')}}
</div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .btn-disabled {
            cursor: not-allowed;
            opacity: 0.5;
        }
    </style>
    
<a href="/produk-member/show" class="btn btn-primary">Riwayat</a>
<div class="card">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Publish Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            @foreach ($produks as $produk)
            <tbody>
                <tr class="text-nowrap">
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td class="col-md-2"><img src="{{ Storage::url($produk->image)}}" class="image-thumbnail img-fluid" style="max-width: 100%;"></td>
                    <td>{!! $produk->deskripsi !!}</td>
                    <td>Rp. {{ $produk->harga }}</td>
                    <td>{{ date('d F Y:i:s', strtotime($produk->created_at)) }}</td>
                    <td>{{ $produk->status }}</td>
                    <td>
                        <button id="pesanButton{{ $produk->id }}" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pesan{{ $produk->id }}">
                            Pesan
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#detail{{ $produk->id }}">
                            Detail
                        </button>
                    </td>
                </tr>
                {{-- modal Pesan --}}
                <div class="modal fade" id="pesan{{ $produk->id }}" tabindex="-1" aria-labelledby="pesan{{ $produk->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pesan{{ $produk->id }}Label">Pesan Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <form action="/produk-transaksi-member" method="POST">
                                    @csrf
                                    <img src="{{ Storage::url($produk->image)}}" class="img-fluid" style="max-width: 20%;">
                                    <div class="mb-3">
                                        <input type="hidden" name="layanan_id" value="{{ $produk->id }}" class="form-control text-center" id="exampleFormControlInput1" readonly>
                                        <input type="hidden" name="status" value="pending">
                                        <input type="hidden" name="pembayaran" value="pending">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                                        <input type="text" name="nama" class="form-control text-center" id="exampleFormControlInput1" value="{{ $produk->nama }}" readonly>
                                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                                        <input type="text" name="harga" value="{{ $produk->harga }}" class="form-control text-center" id="exampleFormControlInput1" readonly>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Pesan</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal --}}
                {{-- Modal Produk --}}
                <div class="modal fade" id="detail{{ $produk->id }}" tabindex="-1" aria-labelledby="detail{{ $produk->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detail{{ $produk->id }}Label">Detail Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ Storage::url($produk->image)}}" class="image-thumbnail img-fluid" style="max-width: 100%;">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Deskripsi:</h4>
                                        <p>{!! $produk->deskripsi !!}</p>
                                        <h4>Harga:</h4>
                                        <p>Rp. {{ $produk->harga }}</p>
                                        <h4>Publish Date:</h4>
                                        <p>{{ $produk->created_at }}</p>
                                        <h4>Status:</h4>
                                        <p>{{ $produk->status }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function(){
        @foreach($produks as $produk)
            var status = "{{ $produk->status }}";
            if (status === "close") {
                $("#pesanButton{{ $produk->id }}").addClass("btn-disabled");
                $("#pesanButton{{ $produk->id }}").prop("disabled", true);
            }
        @endforeach
    });
</script>
{{ $produks->links()}}
@endsection
