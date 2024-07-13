<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::where('id_user', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        // SELECT * FROM history WHERE id_user = auth()->user()->id ORDER BY created_at DESC;

        return view('history', compact('histories'));
    }
}
