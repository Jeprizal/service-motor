@extends('member.layout.main')
@section('container')
<br />
<center>
    <h1>Riwayat Pesanan</h1>
</center>
@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
    {{ session('pesan') }}
</div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .btn-disabled {
            cursor: not-allowed;
            opacity: 0.5;
        }
    </style>
<div class="card">
    <div class="table-responsive">
        <table class="table mb-3">
            <thead>
                <tr class="text-nowrap">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail Pembayaran</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Waktu Pemesanan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            @foreach ($transaksis as $transaksi)
            @if($transaksi->user_id == Auth::user()->id)
            <tbody>
                <tr class="text-nowrap">
                    <td class="p-3" scope="row">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $transaksi->nama }}</td>
                    <td class="p-3">{{ $transaksi->harga }}</td>
                    <td class="p-3">@if ($transaksi->status == 'success')
                        <span class="badge bg-success">{{ $transaksi->status }}</span>
                    @elseif($transaksi->status == 'pending')
                        <span class="badge bg-danger">{{ $transaksi->status }}</span>
                    @endif</td>
                    <td class="p-3"><img src="{{ Storage::url($transaksi->detail_bayar)}}" class="image-thumbnail img-fluid" style="max-width: 20%;"></td>

                    <td class="p-3">@if ($transaksi->pembayaran == 'success')
                        <span class="badge bg-success">{{ $transaksi->pembayaran }}</span>
                    @elseif($transaksi->pembayaran == 'pending')
                        <span class="badge bg-danger">{{ $transaksi->pembayaran }}</span>
                    @endif</td>
                    <td class="p-3">{{ date('d F Y:i:s', strtotime($transaksi->created_at)) }}</td>
                    <td class="p-3">
                        <a href="{{ route('download.pdf', ['id' => $transaksi->id]) }}" class="btn btn-info">Cetak</a>
                        <button id="paidButton{{ $transaksi->id }}" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#paid{{ $transaksi->id }}">
                            Paid
                        </button>
                    </td>
                </tr>
                {{-- modal paid--}}
                <div class="modal fade" id="paid{{ $transaksi->id }}" tabindex="-1" aria-labelledby="paid{{ $transaksi->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="paid{{ $transaksi->id }}Label">Upload Bukti Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="card">
                                        <div class="card-header">Detail Pembayaran</div>
                                        <div class="card-body">
                                            @foreach ($payments as $payment)
                                            <p><strong>Name:</strong> {{ $payment->name }}</p>
                                            <p><strong>Number:</strong> {{ $payment->number }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('transaksi.paid', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <div class="card">
                                            <div class="card-header">Upload Bukti Pembayaran</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="detail_bayar">Pilih Foto:</label>
                                                    <input type="file" class="form-control-file" id="detail_bayar" name="detail_bayar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Paid</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end modal --}}
             {{-- modal image--}}
             <div class="modal fade" id="gambar{{ $transaksi->id }}" tabindex="-1" aria-labelledby="gambar{{ $transaksi->id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gambar{{ $transaksi->id }}Label">Upload Bukti Pembayaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="card">
                                    <div class="card-header">Detail Pembayaran</div>
                                    <img src="{{ Storage::url($transaksi->detail_bayar)}}" class="image-thumbnail img-fluid" alt="Belum dibayar">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
            @endif
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function(){
        @foreach($transaksis as $transaksi)
            var status = "{{ $transaksi->status }}";
            if (status === "success") {
                $("#paidButton{{ $transaksi->id }}").addClass("btn-disabled");
                $("#paidButton{{ $transaksi->id }}").prop("disabled", true);
            }
        @endforeach
    });
</script>

{{ $transaksis->links() }}
@endsection
