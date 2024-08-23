<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importExcel(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xlsx,xls',
        ]);
        Excel::import(new DataImport(), $request->file('excel'));
        return redirect('admin/dataPenduduk')->with('success', 'Nilai Berhasil diimport!');
    }
}
