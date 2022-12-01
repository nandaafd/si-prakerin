<?php

namespace App\Http\Controllers;

use App\Http\Repositories\WokikppcRepository;
use App\Models\WoKikppc;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use XBase\Enum\FieldType;
use XBase\Enum\TableType;
use XBase\Header\Column;
use XBase\Header\HeaderFactory;
use XBase\TableCreator;
use XBase\TableEditor;
use Auth;

// Dynamic Date updated on 29 Agustus 2022 by Firman (Fix)

class WoKikppcController extends Controller
{

    public function dbf_wokikppc(Request $request, WokikppcRepository $wokikppcRepository)
    {

        $tanggal = '';
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');
        
        if (empty($bulan) && empty($tahun)) {
            $tanggal = date('d');
            $bulan = date('m');
            $tahun = date('Y');
        }

        $path = public_path('doc');
        $filepath = $path . "/WO" . $tahun . $bulan . ".dbf";
        
        if (file_exists($filepath)) {
            unlink($filepath);
        }

        $wokikppcRepository->createFile($filepath);

        return $wokikppcRepository->write_wokikppc($tanggal, $bulan, $tahun);
    }

    
}
