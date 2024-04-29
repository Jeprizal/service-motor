<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Transaksi;

class PdfController extends Controller
{
    public function downloadPdf($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $data = ['transaksi' => $transaksi];
        $pdf = PDF::loadView('pdf.pdf', $data);
        return $pdf->download('riwayat-transaksi.pdf');
    }
}
