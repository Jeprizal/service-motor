<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();
        return view('dashboard.payment.index', compact('payment'));
    }

    public function create()
    {
        return view('dashboard.payment.create');
    }
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view(
            'dashboard.payment.edit',
            [
                'payment' => $payment
            ]
        );
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'number' => 'required'
        ]);
        Payment::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $validatedData['name'],
                'number' => $validatedData['number'],
            ]
        );
        if ($request->id) {
            return redirect()->route('payment.index')->with('success', 'Success Update Payment!');
        } else {
            return redirect()->route('payment.index')->with('success', 'Success Menambah Payment!');
        }
    }
}
