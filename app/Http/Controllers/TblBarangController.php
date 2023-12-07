<?php

namespace App\Http\Controllers;

use App\Models\Tbl_Barang;
use Illuminate\Http\Request;

class TblBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.barang.index', [
            'tbl_barang' => Tbl_Barang::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'KODEBRG' => 'required|max:10|unique:TBL_BARANG',
            'NAMABRG' => 'required|max:100',
            'SATUAN' => 'required|max:10',
            'HARGABELI' => 'required|unique:TBL_BARANG',
        ]);

        Tbl_Barang::create($validatedData);

        return redirect('/dashboard/barang')->with('success', 'Barang berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $tbl_Barang = Tbl_Barang::find($id);
        return view('dashboard.barang.show', [
            'tbl_barang' => $tbl_Barang
        ]);

        // return view('dashboard.barang.show', [
        //     'tbl_barang' => $tbl_Barang
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $tbl_Barang = Tbl_Barang::find($id);

        return view('dashboard.barang.edit', [
            'tbl_Barang' => $tbl_Barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $tbl_Barang = Tbl_Barang::find($id);

        $rules = [];
        if ($request->KODEBRG != $tbl_Barang->KODEBRG) {
            $rules['KODEBRG'] = 'required|max:10';
        }
        if ($request->NAMABRG != $tbl_Barang->NAMABRG) {
            $rules['NAMABRG'] = 'required|max:100';
        }
        if ($request->SATUAN != $tbl_Barang->SATUAN) {
            $rules['SATUAN'] = 'required|max:10';
        }
        if ($request->HARGABELI != $tbl_Barang->HARGABELI) {
            $rules['HARGABELI'] = 'required';
        }
        // dd($request->all());
        $validatedData = $request->validate($rules);

        Tbl_Barang::where('id', $tbl_Barang->id)->update($validatedData);

        return redirect('/dashboard/barang')->with('success', 'Barang berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $tbl_Barang = Tbl_Barang::find($id);

        Tbl_Barang::destroy($tbl_Barang->id);

        return redirect('/dashboard/barang')->with('success', 'Barang berhasil dihapus!');
    }
}
