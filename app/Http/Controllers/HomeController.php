<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'get_siswa' => Siswa::all(),

        ];
        return view('dashboard', $data);
    }
}
