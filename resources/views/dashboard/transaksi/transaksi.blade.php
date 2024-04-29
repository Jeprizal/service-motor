@extends('dashboard.layout.main')
@section('container')
<br />
<center>
    <h1>Data Transaksi</h1>
</center>
@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
    {{ session('pesan') }}
</div>
@endif
{{-- <a href="" class="btn btn-primary">Riwayat</a> --}}
<div class="card">
    <div class="table-responsive">
        <table class="table mb-3">
            <thead>
                <tr class="text-nowrap align-middle">
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail Pembayaran</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Waktu Pemesanan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($transaksis as $transaksi)
                <tr class="text-nowrap">
                    <td class="p-3" scope="row">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $transaksi->nama }}</td>
                    <td class="p-3">Rp. {{ $transaksi->harga }}</td>
                    <td class="p-3">@if ($transaksi->status == 'success')
                        <span class="badge bg-success">{{ $transaksi->status }}</span>
                        @elseif($transaksi->status == 'pending')
                        <span class="badge bg-danger">{{ $transaksi->status }}</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#gambar{{ $transaksi->id }}">
                            <span>Tampilkan Gambar</span>
                            <i class="bi bi-image-fill"></i>
                          </button>
                    </td>
                    <td class="p-3">@if ($transaksi->pembayaran == 'success')
                        <span class="badge bg-success">{{ $transaksi->pembayaran }}</span>
                        @elseif($transaksi->pembayaran == 'pending')
                        <span class="badge bg-danger">{{ $transaksi->pembayaran }}</span>
                        @endif</td>
                    <td class="p-3">{{ date('d F Y:i:s', strtotime($transaksi->created_at)) }}</td>
                    <td class="p-3">
                        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="d-inline">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="status" value="success">
                            <input type="hidden" name="pembayaran" value="success">
                            <button type="submit" class="btn btn-warning">Konfirmasi</button>
                        </form>
                        <form action="/transaksi/{{ $transaksi->id }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf

                            <button class="btn btn-danger" type="submit" onclick="return confirm
                            ('Yakin akan menghapus data ?')">Delete</button>
                        </form>
                        <a href="{{ route('download.pdf', ['id' => $transaksi->id]) }}" class="btn btn-info">Cetak</a>
                    </td>
                </tr>

                {{-- modal --}}
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
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $transaksis->links() }}
@endsection
