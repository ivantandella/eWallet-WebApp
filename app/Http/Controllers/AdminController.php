<?php

namespace App\Http\Controllers;

use App\Models\CashOut;
use App\Models\User;
use App\Models\Pembayaran;
use App\Models\Layanan;
use App\Models\History;
use App\Models\TopUp;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class AdminController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        $users = user::all();
        // SELECT * FROM users;

        $transactions = pembayaran::all();
        // SELECT * FROM pembayaran;

        $layanan = layanan::all();
        // SELECT * FROM layanan;

        return view('admin.dashboard', ['title' => $title, 'users' => $users, 'transactions' => $transactions, 'layanan' => $layanan]);
    }

    public function user()
    {
        $title = "User Setting";
        $users = user::all();
        // SELECT * FROM users;

        $trash = user::onlyTrashed()->get();
        return view('admin.user', ['users' => $users, 'title' => $title, 'trash' => $trash]);
    }

    public function deleteUser($id)
    {
        $user = user::find($id);
        $user->delete();
        // DELETE FROM users WHERE id = $id;

        return redirect()->back();
    }

    public function restoreUser($id)
    {
        $user = user::onlyTrashed()->find($id);
        $user->restore();

        return redirect()->back();
    }

    public function transaksi()
    {
        $title = "Transaksi";
        $transactions = pembayaran::all();
        // SELECT * FROM pembayaran;

        return view("admin.transaksi", ['transactions' => $transactions, 'title' => $title]);
    }

    public function layanan()
    {
        $title = "Daftar Layanan";
        $layanan = layanan::all();
        // SELECT * FROM layanan;

        return view("admin.layanan", ['title' => $title, 'layanan' => $layanan]);
    }

    public function tambahLayanan(Request $keyword)
    {
        layanan::create([
            'jenis_layanan' => $keyword->jenis_layanan,
            'nama_perusahaan' => $keyword->nama_perusahaan,
        ]);
        // INSERT INTO layanan (jenis_layanan, nama_perusahaan) VALUES ($keyword->jenis_layanan, $keyword->nama_perusahaan);

        return redirect()->back();
    }

    public function cashout()
    {
        $title = "Daftar Cashout";
        $cashout = CashOut::all();
        // SELECT * FROM cash_out;

        return view("admin.cashout", ['title' => $title, 'cashouts' => $cashout]);
    }

    public function topup()
    {
        $title = "Daftar Cashout";
        $topup = topup::all();
        // SELECT * FROM top_up;

        return view("admin.topup", ['title' => $title, 'topups' => $topup]);
    }

    public function konfirmasiTopup($id)
    {
        $data = TopUp::where('id_top_up', $id)->first();
        // SELECT * FROM top_up WHERE id_top_up = $id;

        topup::where('id_top_up', $id)
            ->update([
                'status' => "1"
            ]);
        // UPDATE top_up SET status = '1' WHERE id_top_up = $id;

        $user = User::where('id', $data->id_user)->first();
        // SELECT * FROM users WHERE id = $data->id_user;

        User::where('id', $data->id_user)->update([
            'saldo' => $user->saldo + $data->nominal
        ]);
        // UPDATE users SET saldo = $user->saldo + $data->nominal WHERE id = $data->id_user;

        History::create([
            'id_user' => $user->id,
            'nominal' => $data->nominal,
            'keterangan' => 'Top-Up',
        ]);
        // INSERT INTO history (id_user, nominal, keterangan) VALUES ($user->id, $data->nominal, 'Top-Up');

        return back()->with('success', 'Topup berhasil dikonfirmasi');
    }

    public function tolakTopup($id)
    {
        $data = TopUp::where('id_top_up', $id)->first();
        // SELECT * FROM top_up WHERE id_top_up = $id;

        topup::where('id_top_up', $id)
            ->update([
                'status' => "2"
            ]);
        // UPDATE top_up SET status = '2' WHERE id_top_up = $id;

        $user = User::where('id', $data->id_user)->first();
        // SELECT * FROM users WHERE id = $data->id_user;

        History::create([
            'id_user' => $user->id,
            'nominal' => $data->nominal,
            'keterangan' => 'Top-Up Rejected',
        ]);
        // INSERT INTO history (id_user, nominal, keterangan) VALUES ($user->id, $data->nominal, 'Top-Up Rejected');

        return back()->with('success', 'Topup berhasil ditolak');
    }

    public function transfer()
    {
        $title = 'Transfer';
        $transfer = transfer::all();
        // SELECT * FROM transfer;

        return view('admin.transfer', ['title' => $title, 'transfers' => $transfer]);
    }

    public function history($id)
    {
        $title = 'Riwayat';
        $histories = History::where('id_user', $id)->orderBy('created_at', 'desc')->get();
        // SELECT * FROM history WHERE id_user = $id ORDER BY created_at DESC;

        return view('admin.history', compact('histories', 'title'));
    }
}
