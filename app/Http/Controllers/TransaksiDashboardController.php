<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Payment;
use App\Models\Produk;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TransaksiDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::latest()->paginate(10);
        return view('dashboard.transaksi.transaksi',[
            'transaksis'=>$transaksi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'layanan_id' => 'required',
            'nama' => 'required',
            'harga' => 'required',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = 'pending';
        $validatedData['pembayaran'] = 'pending';
        $validatedData['detail_bayar'] = '-';
        Transaksi::create($validatedData);
        return redirect('/produk-member')->with('pesan', 'Pesanan berhasil, silahkan menyelesaikan pembayaran.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('dashboard.transaksi.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:success,pending',
            'pembayaran' => 'required|in:success,pending',
        ]);
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $validatedData['status'];
        $transaksi->pembayaran = $validatedData['pembayaran'];
        $transaksi->save();
        return redirect()->back()->with('pesan', 'Konfirmasi transaksi berhasil');
    }
    public function paid(Request $request, $id)
    {
        $validatedData = $request->validate([
            'detail_bayar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->detail_bayar) {
            Storage::delete($transaksi->detail_bayar);
        }

        $detail_bayarPath = $request->file('detail_bayar')->store('public/uploads');

        $transaksi->detail_bayar = $detail_bayarPath;
        $transaksi->save();

        return redirect()->back()->with('pesan', 'Pembayaran diterima, Silahkan menunggu konfirmasi dari admin');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
