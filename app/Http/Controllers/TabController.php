<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabController extends Controller
{
    public function showTab($tab)
    {
        // Simpan tab yang aktif di session
        session(['activeTab' => $tab]);
        // Redirect ke halaman sebelumnya
        return redirect()->back();
    }
}