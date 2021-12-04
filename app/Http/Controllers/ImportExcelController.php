<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Excel;

class ImportExcelController extends Controller
{
    function index()
    {
     $data = City::orderBy('id', 'DESC')->get();
     return view('import_excel', compact('data'));
    }

    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);
    Excel::import(new UsersImport,$request->file('select_file'));
    return back()->with('success', 'Excel Data Imported successfully.');
    }
}





