<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kucing;

class KucingController extends Controller
{
    public function index()
    {
        $kucings = Kucing::all();
        return view('DaftarKucing', compact('kucings'));
    }

    public function show($id)
    {
        $kucing = Kucing::findOrFail($id);
        return view('DetailKucing', compact('kucing'));
    }
}