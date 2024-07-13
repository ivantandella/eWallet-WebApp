<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use App\Models\Layanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PembayaranController extends Controller
{
    public function pln()
    {
        $user = auth()->user();
        $layanan = Layanan::where('nama_perusahaan', 'PLN')->first();
        // SELECT * FROM layanan WHERE nama_perusahaan = 'PLN';

        if (!$user->pin) {
            return redirect(route('pin', $user->id))->with('info', 'Please create your PIN!');
        }

        return view('pln', compact('user', 'layanan'));
    }

    public function payPLN(Request $request, $id)
    {
        $request->validate([
            'nomor' => 'required',
            'nominal' => 'required|numeric',
            'pin' => 'required|size:6',
        ]);

        $user = User::where('id', $id)->first();
        // SELECT * FROM users WHERE id = $id;

        if ($user->saldo < $request->nominal) {
            return back()->with('warning', 'Saldo anda tidak cukup!');
        }

        if (Hash::check($request->pin, $user->pin)) {
            Pembayaran::create([
                'id_user' => $user->id,
                'id_layanan' => $request->id_layanan,
                'nomor' => $request->nomor,
                'nominal' => $request->nominal,
            ]);
            // INSERT INTO pembayaran (id_user, id_layanan, nomor, nominal) VALUES ($user->id, $request->id_layanan, $request->nomor, $request->nominal);

            User::where('id', $id)->update([
                'saldo' => $user->saldo - $request->nominal
            ]);
            // UPDATE users SET saldo = $user->saldo - $request->nominal WHERE id = $id;

            History::create([
                'id_user' => $user->id,
                'nominal' => $request->nominal,
                'keterangan' => 'Pay PLN ' . $request->nomor,
            ]);
            // INSERT INTO history (id_user, nominal, keterangan) VALUES ($user->id, $request->nominal, 'Pay PLN $request->nomor');

            return back()->with('success', 'Berhasil melakukan pembayaran!');
        } else {
            return back()->with('warning', 'Wrong PIN!');
        }
    }

    public function pdam()
    {
        $user = auth()->user();
        $layanan = Layanan::where('nama_perusahaan', 'PDAM')->first();
        // SELECT * FROM layanan WHERE nama_perusahaan = 'PDAM';

        if (!$user->pin) {
            return redirect(route('pin', $user->id))->with('info', 'Please create your PIN!');
        }

        return view('pdam', compact('user', 'layanan'));
    }

    public function payPDAM(Request $request, $id)
    {
        $request->validate([
            'nomor' => 'required',
            'nominal' => 'required|numeric',
            'pin' => 'required|size:6',
        ]);

        $user = User::where('id', $id)->first();
        // SELECT * FROM users WHERE id = $id;

        if ($user->saldo < $request->nominal) {
            return back()->with('warning', 'Saldo anda tidak cukup!');
        }

        if (Hash::check($request->pin, $user->pin)) {
            Pembayaran::create([
                'id_user' => $user->id,
                'id_layanan' => $request->id_layanan,
                'nomor' => $request->nomor,
                'nominal' => $request->nominal,
            ]);
            // INSERT INTO pembayaran (id_user, id_layanan, nomor, nominal) VALUES ($user->id, $request->id_layanan, $request->nomor, $request->nominal);

            User::where('id', $id)->update([
                'saldo' => $user->saldo - $request->nominal
            ]);
            // UPDATE users SET saldo = $user->saldo - $request->nominal WHERE id = $id;

            History::create([
                'id_user' => $user->id,
                'nominal' => $request->nominal,
                'keterangan' => 'Pay PDAM ' . $request->nomor,
            ]);
            // INSERT INTO history (id_user, nominal, keterangan) VALUES ($user->id, $request->nominal, 'Pay PDAM $request->nomor');

            return back()->with('success', 'Berhasil melakukan pembayaran!');
        } else {
            return back()->with('warning', 'Wrong PIN!');
        }
    }

    public function pulsa()
    {
        $user = auth()->user();
        $layanan = Layanan::where('jenis_layanan', 'pulsa')->orderBy('nama_perusahaan')->get();
        // SELECT * FROM layanan WHERE jenis_layanan = 'pulsa' ORDER BY nama_perusahaan;

        if (!$user->pin) {
            return redirect(route('pin', $user->id))->with('info', 'Please create your PIN!');
        }

        return view('pulsa', compact('user', 'layanan'));
    }

    public function payPulsa(Request $request, $id)
    {
        $request->validate([
            'id_layanan' => 'required',
            'nomor' => 'required|numeric',
            'nominal' => 'required',
            'pin' => 'required|size:6',
        ]);

        $user = User::where('id', $id)->first();
        // SELECT * FROM users WHERE id = $id;

        if ($user->saldo < $request->nominal) {
            return back()->with('warning', 'Saldo anda tidak cukup!');
        }

        if (Hash::check($request->pin, $user->pin)) {
            Pembayaran::create([
                'id_user' => $user->id,
                'id_layanan' => $request->id_layanan,
                'nomor' => $request->nomor,
                'nominal' => $request->nominal,
            ]);
            // INSERT INTO pembayaran (id_user, id_layanan, nomor, nominal) VALUES ($user->id, $request->id_layanan, $request->nomor, $request->nominal);

            User::where('id', $id)->update([
                'saldo' => $user->saldo - $request->nominal
            ]);
            // UPDATE users SET saldo = $user->saldo - $request->nominal WHERE id = $id;

            History::create([
                'id_user' => $user->id,
                'nominal' => $request->nominal,
                'keterangan' => 'Buy Pulsa ' . $request->nomor,
            ]);
            // INSERT INTO history (id_user, nominal, keterangan) VALUES ($user->id, $request->nominal, 'Buy Pulsa $request->nomor');

            return back()->with('success', 'Berhasil!');
        } else {
            return back()->with('warning', 'Wrong PIN!');
        }
    }

    public function internet()
    {
        $user = auth()->user();
        $layanan = Layanan::where('jenis_layanan', 'internet')->orderBy('nama_perusahaan')->get();
        // SELECT * FROM layanan WHERE jenis_layanan = 'internet' ORDER BY nama_perusahaan;

        if (!$user->pin) {
            return redirect(route('pin', $user->id))->with('info', 'Please create your PIN!');
        }

        return view('internet', compact('user', 'layanan'));
    }

    public function payInternet(Request $request, $id)
    {
        $request->validate([
            'id_layanan' => 'required',
            'nomor' => 'required|numeric',
            'nominal' => 'required',
            'pin' => 'required|size:6',
        ]);

        $user = User::where('id', $id)->first();
        // SELECT * FROM users WHERE id = $id;

        if ($user->saldo < $request->nominal) {
            return back()->with('warning', 'Saldo anda tidak cukup!');
        }

        if (Hash::check($request->pin, $user->pin)) {
            Pembayaran::create([
                'id_user' => $user->id,
                'id_layanan' => $request->id_layanan,
                'nomor' => $request->nomor,
                'nominal' => $request->nominal,
            ]);
            // INSERT INTO pembayaran (id_user, id_layanan, nomor, nominal) VALUES ($user->id, $request->id_layanan, $request->nomor, $request->nominal);

            User::where('id', $id)->update([
                'saldo' => $user->saldo - $request->nominal
            ]);
            // UPDATE users SET saldo = $user->saldo - $request->nominal WHERE id = $id;

            History::create([
                'id_user' => $user->id,
                'nominal' => $request->nominal,
                'keterangan' => 'Pay Internet ' . $request->nomor,
            ]);
            // INSERT INTO history (id_user, nominal, keterangan) VALUES ($user->id, $request->nominal, 'Pay Internet $request->nomor');

            return back()->with('success', 'Berhasil!');
        } else {
            return back()->with('warning', 'Wrong PIN!');
        }
    }
}
