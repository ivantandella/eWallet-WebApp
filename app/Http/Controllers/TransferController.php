<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TransferController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user->pin) {
            return redirect(route('pin', $user->id))->with('info', 'Please create your PIN!');
        }

        return view('transfer', compact('user'));
    }

    public function send(Request $request, $id)
    {
        $request->validate([
            'no_hp_penerima' => 'required|numeric|exists:users,no_hp',
            'nominal' => 'required|numeric',
            'pin' => 'required|size:6',
        ]);

        $pengirim = User::where('id', $id)->first();
        // SELECT * FROM users WHERE id = $id;

        if ($pengirim->saldo < $request->nominal) {
            return back()->with('warning', 'Saldo anda tidak cukup!');
        }

        if (Hash::check($request->pin, $pengirim->pin)) {
            Transfer::create([
                'no_hp_penerima' => $request->no_hp_penerima,
                'nominal' => $request->nominal,
                'deskripsi' => $request->deskripsi,
                'id_user' => auth()->user()->id
            ]);
            // INSERT INTO transfer (no_hp_penerima, nominal, deskripsi, id_user) VALUES ($request->no_hp_penerima, $request->nominal, $request->deskripsi, auth()->user()->id);

            History::create([
                'id_user' => auth()->user()->id,
                'nominal' => $request->nominal,
                'keterangan' => 'Send Money to ' . $request->no_hp_penerima,
            ]);
            // INSERT INTO history (id_user, nominal, keterangan) VALUES (auth()->user()->id, $request->nominal, 'Send Money to $request->no_hp_penerima');

            User::where('id', $id)->update([
                'saldo' => $pengirim->saldo - $request->nominal
            ]);
            // UPDATE users SET saldo = $pengirim->saldo - $request->nominal WHERE id = $id;

            $user = User::where('no_hp', $request->no_hp_penerima)->first();
            // SELECT * FROM users WHERE no_hp = $request->no_hp_penerima;

            $penerima = User::where('id', $user->id)->first();
            // SELECT * FROM users WHERE id = $user->id;

            User::where('id', $user->id)->update([
                'saldo' => $penerima->saldo + $request->nominal
            ]);
            // UPDATE users SET saldo = $penerima->saldo + $request->nominal WHERE id = $id;

            History::create([
                'id_user' => $user->id,
                'nominal' => $request->nominal,
                'keterangan' => 'Received Money',
            ]);
            // INSERT INTO history (id_user, nominal, keterangan) VALUES (auth()->user()->id, $request->nominal, 'Received Money');

            return back()->with('success', 'Berhasil melakukan transfer!');
        } else {
            return back()->with('warning', 'Wrong PIN!');
        }
    }
}
