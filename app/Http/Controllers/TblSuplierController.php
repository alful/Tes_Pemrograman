<?php

namespace App\Http\Controllers;

use App\Models\Tbl_Suplier;
use Illuminate\Http\Request;

class TblSuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.suplier.index', [
            'tbl_suplier' => Tbl_Suplier::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.suplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'KODESPL' => 'required|max:10|unique:TBL_SUPLIER',
            'NAMASPL' => 'required|max:100',
        ]);

        Tbl_Suplier::create($validatedData);

        return redirect('/dashboard/suplier')->with('success', 'Suplier berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $tbl_Suplier = Tbl_Suplier::find($id);
        return view('dashboard.suplier.show', [
            'tbl_Suplier' => $tbl_Suplier
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $tbl_Suplier = Tbl_Suplier::find($id);

        return view('dashboard.suplier.edit', [
            'tbl_Suplier' => $tbl_Suplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $tbl_Suplier = Tbl_Suplier::find($id);

        $rules = [];
        if ($request->KODESPL != $tbl_Suplier->KODESPL) {
            $rules['KODESPL'] = 'required|max:10';
        }
        if ($request->NAMASPL != $tbl_Suplier->NAMASPL) {
            $rules['NAMASPL'] = 'required|max:100';
        }
        // dd($request->all());
        $validatedData = $request->validate($rules);

        Tbl_Suplier::where('id', $tbl_Suplier->id)->update($validatedData);

        return redirect('/dashboard/suplier')->with('success', 'Suplier berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $tbl_Suplier = Tbl_Suplier::find($id);

        Tbl_Suplier::destroy($tbl_Suplier->id);

        return redirect('/dashboard/suplier')->with('success', 'Suplier berhasil dihapus!');
    }
}
