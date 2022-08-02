<?php

namespace App\Http\Controllers;

use App\Models\WoKikppc;
use Illuminate\Http\Request;

use XBase\Enum\FieldType;
use XBase\Enum\TableType;
use XBase\Header\Column;
use XBase\Header\HeaderFactory;
use XBase\TableCreator;
use XBase\TableEditor;

// $filepath = __DIR__ . 'doc/WO' . date('Ymd') . '.DBF';
// if (file_exists($filepath)) {
//     unlink($filepath);
// }

class WoKikppcController extends Controller
{

    public function index()
    {
        // $data = WoKikppc::get();
        $get_detail = WoKikppc::get_detail_wo();
        $wow_no = "";
        $no = 0;
        $data_all = [];
        $flag = 0;
        $data_detail = [];

        foreach ($get_detail as $key => $row) {

            $detail = array(
                "NO_URUT" => $row->no_urut,
                "PATT_CAT_DESC" => $row->patt_cat_desc,
                "QTY_HELAI" => $row->qty_helai,
            );
            if ($no === 0) {
                array_push($data_detail, $detail);
                $no = 1;
                $wow_no = $row->wow_no;
                $flag = 1;
            } else {
                if ($wow_no !== $row->wow_no) {
                    $data_detail = [];
                    array_push($data_detail, $detail);
                    $flag = 1;
                } else {
                    array_push($data_detail, $detail);
                    $flag = 1;
                }
            }
            if ($flag == 1) {
                if ($no == 0) {
                    $data_all[] = [
                        'wow_no' => $wow_no,
                        'detail' => $data_detail
                    ];
                    $data_detail = [];
                } else {
                    $data_all[] = [
                        'wow_no' => $wow_no,
                        'detail' => $data_detail
                    ];
                    $data_detail = [];
                }
            }
            $flag = 0;
        }
        return $data_all;
    }

    public function index2()
    {
        $data = WoKikppc::get_detail_wo();
        return $data;
    }

    public function generate_wokikppc()
    {
        $date = date('ymd');
        $table = new TableEditor('doc\WO' . $date . '.dbf');
        $table->deleteRecord();
        $table
            ->pack() //remove deleted rows
            ->save() //save changes
            ->close();

        return redirect('dbf_wokikppc');
    }

    public function dbf_wokikppc()
    {
        $path = public_path('doc');
        $date = date('ymd');
        $header = HeaderFactory::create(TableType::DBASE_III_PLUS_MEMO);
        $filepath = $path . "\WO" . $date . ".dbf";
        unlink($filepath);
        // if (file_exists($filepath)) {
        //     unlink($path . "\WO" . $date . ".dbf");
        // }
        $tableCreator = new TableCreator($filepath, $header);
        $tableCreator
            ->addColumn(new Column([
                'name'   => 'TGL_KIK',
                'type'   => FieldType::DATE,
                'length' => 8,
            ]))
            ->addColumn(new Column([
                'name'   => 'NO_KIK',
                'type'   => FieldType::CHAR,
                'length' => 20,
            ]))
            ->addColumn(new Column([
                'name'   => 'XNO_KIK',
                'type'   => FieldType::CHAR,
                'length' => 6,
            ]))
            ->addColumn(new Column([
                'name'   => 'NO_PATRUN',
                'type'   => FieldType::CHAR,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'NO_TAM',
                'type'   => FieldType::NUMERIC,
                'length' => 2,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_PROD',
                'type'   => FieldType::CHAR,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PJG',
                'type'   => FieldType::NUMERIC,
                'length' => 9,
            ]))
            ->addColumn(new Column([
                'name'   => 'PJG_AWL',
                'type'   => FieldType::NUMERIC,
                'length' => 9,
            ]))
            ->addColumn(new Column([
                'name'   => 'JML_BNG',
                'type'   => FieldType::NUMERIC,
                'length' => 6,
            ]))
            ->addColumn(new Column([
                'name'   => 'MOTIF',
                'type'   => FieldType::CHAR,
                'length' => 20,
            ]))
            ->addColumn(new Column([
                'name'   => 'SUB_MOTIF',
                'type'   => FieldType::CHAR,
                'length' => 20,
            ]))
            ->addColumn(new Column([
                'name'   => 'KONSTR',
                'type'   => FieldType::CHAR,
                'length' => 15,
            ]))
            ->addColumn(new Column([
                'name'   => 'NO_BUKTI',
                'type'   => FieldType::CHAR,
                'length' => 20,
            ]))
            ->addColumn(new Column([
                'name'   => 'TGL_PROD',
                'type'   => FieldType::DATE,
                'length' => 8,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI1',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI2',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI3',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI4',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI5',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI6',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI7',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI8',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI9',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI10',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI11',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI12',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI13',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI14',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI15',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'LUSI16',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN1',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN2',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN3',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN4',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN5',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN6',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN7',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN8',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN9',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN10',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN11',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN12',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN13',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN14',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN15',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PAKAN16',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR1',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR2',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR3',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR4',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR5',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR6',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR7',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR8',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR9',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR10',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR11',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR12',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR13',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR14',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR15',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'SULUR16',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL1',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL2',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL3',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL4',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL5',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL6',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL7',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL8',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL9',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL10',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL11',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL12',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL13',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL14',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL15',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'TUMPAL16',
                'type'   => FieldType::NUMERIC,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'PASSDIR',
                'type'   => FieldType::CHAR,
                'length' => 8,
            ]))
            ->addColumn(new Column([
                'name'   => 'PASSDES',
                'type'   => FieldType::CHAR,
                'length' => 8,
            ]))
            ->addColumn(new Column([
                'name'   => 'NAMDIR',
                'type'   => FieldType::CHAR,
                'length' => 8,
            ]))
            ->addColumn(new Column([
                'name'   => 'NAMDES',
                'type'   => FieldType::CHAR,
                'length' => 8,
            ]))
            ->addColumn(new Column([
                'name'   => 'CEK',
                'type'   => FieldType::LOGICAL,
                'length' => 1,
            ]))
            ->addColumn(new Column([
                'name'   => 'CEK1',
                'type'   => FieldType::LOGICAL,
                'length' => 1,
            ]))
            ->addColumn(new Column([
                'name'   => 'TGL_CEK',
                'type'   => FieldType::DATE,
                'length' => 8,
            ]))
            ->addColumn(new Column([
                'name'   => 'PASSWORD',
                'type'   => FieldType::CHAR,
                'length' => 8,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG1',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG1',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG2',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG3',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG4',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG5',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG6',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG7',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG8',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG9',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG10',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG11',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG12',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG13',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG14',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG15',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODE_BRG16',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS1',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS2',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS3',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS4',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS5',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS6',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS7',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS8',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS9',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS10',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS11',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS12',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS13',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS14',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS15',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODS16',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT1',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT2',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT3',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT4',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT5',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT6',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT7',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT8',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT9',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT10',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT11',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT12',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT13',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT14',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT15',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KODT16',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD1',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD2',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD3',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD4',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD5',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD6',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD7',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD8',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD9',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD10',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD11',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD12',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD13',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD14',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD15',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'KOD16',
                'type'   => FieldType::CHAR,
                'length' => 13,
            ]))
            ->addColumn(new Column([
                'name'   => 'LP',
                'type'   => FieldType::LOGICAL,
                'length' => 1,
            ]))
            ->addColumn(new Column([
                'name'   => 'NO_PO',
                'type'   => FieldType::CHAR,
                'length' => 20,
            ]))
            ->addColumn(new Column([
                'name'   => 'ID',
                'type'   => FieldType::LOGICAL,
                'length' => 1,
            ]))
            ->addColumn(new Column([
                'name'   => 'KET',
                'type'   => FieldType::CHAR,
                'length' => 20,
            ]))
            ->addColumn(new Column([
                'name'   => 'WRN_VISUAL',
                'type'   => FieldType::CHAR,
                'length' => 30,
            ]));

        $tableCreator
            ->save();

        return redirect('write_wokikppc');
    }

    public function write_wokikppc()
    {

        $date = date('ymd');
        $table = new TableEditor(
            'doc\WO' . $date . '.dbf',
            [
                'editMode' => TableEditor::EDIT_MODE_CLONE, //default
            ]
        );
        $get_wo = WoKikppc::get();

        foreach ($get_wo as $row) {

            $record = $table->appendRecord();
            $record->set('TGL_KIK', date('m/d/y', strtotime($row->wow_date)));
            $record->set('NO_KIK', $row->no_kik);
            $record->set('NO_PATRUN', $row->kd_patrun);
            $record->set('NO_TAM', $row->kd_tmb);
            $record->set('KODE_PROD', $row->prd_code);
            $record->set('PJG', $row->length);
            $record->set('JML_BNG', $row->jml_lusi);
            $record->set('NO_BUKTI', $row->no_bukti);
            $table
                ->writeRecord($record);
        }

        $table
            ->save()
            ->close();
        return redirect('/');
    }
}
