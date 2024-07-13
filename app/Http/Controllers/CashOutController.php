<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use App\Models\CashOut;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CashOutController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $banks = Bank::orderBy('nama_bank', 'asc')->get();
        // SELECT * FROM bank ORDER BY nama_bank ASC;

        if (!$user->pin) {
            return redirect(route('pin', $user->id))->with('info', 'Please create your PIN!');
        }

        return view('cashout', compact('user', 'banks'));
    }

    public function send(Request $request, $id)
    {
        $request->validate([
            'id_bank' => 'required',
            'no_rekening' => 'required|numeric',
            'nama_rekening' => 'required|string',
            'nominal' => 'required|numeric',
            'pin' => 'required|size:6',
        ]);

        $user = User::where('id', $id)->first();
        // SELECT * FROM users WHERE id = $id;

        if ($user->saldo < $request->nominal) {
            return back()->with('warning', 'Saldo anda tidak cukup!');
        }

        if (Hash::check($request->pin, $user->pin)) {
            CashOut::create([
                'id_user' => $user->id,
                'id_bank' => $request->id_bank,
                'no_rekening' => $request->no_rekening,
                'nama_rekening' => $request->nama_rekening,
                'nominal' => $request->nominal,
            ]);
            // INSERT INTO cash_out (id_bank, no_rekening, nama_rekening, nominal) VALUES ($request->id_bank, $request->no_rekening, $request->nama_rekening, $request->nominal);

            History::create([
                'id_user' => $user->id,
                'nominal' => $request->nominal,
                'keterangan' => 'Cash Out to ' . $request->no_rekening,
            ]);
            // INSERT INTO history (id_user, nominal, keterangan) VALUES ($user->id, $request->nominal, 'Cash Out to $request->no_rekening');

            User::where('id', $id)->update([
                'saldo' => $user->saldo - $request->nominal
            ]);
            // UPDATE users SET saldo = $user->saldo - $request->nominal WHERE id = $id;

            return back()->with('success', 'Berhasil!');
        } else {
            return back()->with('warning', 'Wrong PIN!');
        }
    }
}
