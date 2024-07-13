<?php

namespace App\Http\Controllers;

use App\Models\TopUp;
use App\Models\History;
use Illuminate\Http\Request;

class TopUpController extends Controller
{
    public function index()
    {
        return view('topup');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric',
            'bukti_tf' => 'required|image',
        ]);

        TopUp::create([
            'id_user' => $request->id_user,
            'nominal' => $request->nominal,
            'bukti_tf' => $request->file('bukti_tf')->store('topup'),
        ]);
        // INSERT INTO top_up (id_user, nominal, bukti_tf) VALUES ($request->id_user, $request->nominal, $request->bukti_tf)

        return back()->with('info', 'Top-up anda akan segera kami verifikasi!');
    }
}
