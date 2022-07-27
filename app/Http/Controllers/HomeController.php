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
            'header_css' => array(
                './assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                './assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
                './assets/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
            ),
            'footer_js' => array(
                './assets/template/plugins/datatables/jquery.dataTables.min.js',
                './assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                './assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js',
                './assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
                './assets/template/plugins/datatables-buttons/js/dataTables.buttons.min.js',
                './assets/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
                './assets/template/plugins/jszip/jszip.min.js',
                './assets/template/plugins/pdfmake/pdfmake.min.js',
                './assets/template/plugins/pdfmake/vfs_fonts.js',
                './assets/template/plugins/datatables-buttons/js/buttons.html5.min.js',
                './assets/template/plugins/datatables-buttons/js/buttons.print.min.js',
                './assets/template/plugins/datatables-buttons/js/buttons.colVis.min.js',
            ),
        ];
        return view('dashboard', $data);
    }
}
