<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesController extends Controller
{
    //
    public function tes() {
        return response()->json([
                'message' => 'Unauthorized'
            ], 401);
    }
}
