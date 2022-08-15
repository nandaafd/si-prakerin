<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Siswa;

use XBase\Enum\FieldType;
use XBase\Enum\TableType;
use XBase\Header\Column;
use XBase\Header\HeaderFactory;
use XBase\TableCreator;
use XBase\TableEditor;
use XBase\TableReader;

class SiswaController extends Controller
{
    public function generate_siswa()
    {
        $date = date('Ymd');
        $table = new TableEditor('doc\siswa' . $date . '.dbf');
        $table->deleteRecord();
        $table
            ->pack() //remove deleted rows
            ->save() //save changes
            ->close();

        return redirect('generate_dbf');
    }

    public function generate_dbf()
    {
        $path = public_path('doc');
        $date = date('Ymd');
        $header = HeaderFactory::create(TableType::DBASE_III_PLUS_MEMO);
        $filepath = $path . "\siswa" . $date . ".dbf";
        // $filepath = $path . "\siswa.dbf";
        if (file_exists($filepath)) {
            unlink($filepath);
        }
        $tableCreator = new TableCreator($filepath, $header);
        // return 'ok';
        // format Kolom yang ada di file dbf
        $tableCreator
            ->addColumn(new Column([
                'name'   => 'nama_siswa',
                'type'   => FieldType::CHAR,
                'length' => 20,
            ]))
            ->addColumn(new Column([
                'name'   => 'nis',
                'type'   => FieldType::CHAR,
                'length' => 10,
            ]))
            ->addColumn(new Column([
                'name'   => 'alamat',
                'type'   => FieldType::CHAR,
                'length' => 100,
            ]))
            ->addColumn(new Column([
                'name'   => 'no_telp',
                'type'   => FieldType::CHAR,
                'length' => 12,
            ]));

        $tableCreator
            ->save();

        // $table = new TableEditor('doc\siswa.dbf');

        return redirect('write_dbf');
    }

    public function write_dbf()
    {
        $date = date('Ymd');
        $table = new TableEditor(
            'doc\siswa' . $date . '.dbf',
            [
                'editMode' => TableEditor::EDIT_MODE_CLONE, //default
            ]
        );
        // $get_siswa = Siswa::all();

        // foreach ($get_siswa as $row) {

        //     $record = $table->appendRecord();
        //     $record->set('nama_siswa', $row->nama_siswa);
        //     $record->set('nis', $row->nis);
        //     $record->set('alamat', $row->alamat);
        //     $record->set('no_telp', $row->no_telp);
        //     $table
        //         ->writeRecord($record);
        // }

        $table
            ->save()
            ->close();
        return redirect('/');
    }
}
