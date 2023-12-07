<?php

namespace App\Http\Controllers;

use App\Models\Tbl_Barang;
use App\Models\Tbl_Dbeli;
use App\Models\Tbl_Hbeli;
use App\Models\Tbl_Hutang;
use App\Models\Tbl_Stock;
use App\Models\Tbl_Suplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tbl_Dbeli = Tbl_Dbeli::get();
        return view('dashboard.pembelian.index', [
            'tbl_hbeli' => Tbl_Hbeli::get(),
            // 'tbl_dbeli' => Tbl_Dbeli::where('NOTRANSAKSI', $tbl_Dbeli->NOTRANSAKSI)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $users = Tbl_Hbeli::pluck('TGL', 'id');
        // $invoiceSeries = config('invoiceSettings.availableInvoiceSeries');
        $number = Tbl_Hbeli::all()->count();
        $newOrderId = 'B' . date('Ym') . str_pad($number + 1, 3, 0, STR_PAD_LEFT);

        return view('dashboard.pembelian.create', [
            'tbl_suplier' => Tbl_Suplier::all(),
            'tbl_barang' => Tbl_Barang::all(),
            'tbl_hrg' => Tbl_Barang::all(),
            'tbl_Dbeli' => Tbl_Dbeli::all(),
            'notr' => $newOrderId,
            // 'Dbeli_harga' => Tbl_Dbeli::where('KODEBRG', request()->get('KODEBRG'))->get(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $date = Tbl_Hbeli::pluck('TGLBELI');
        // dd($request->get('QTY'));

        $validatedDataHbeli = $request->validate([
            'NOTRANSAKSI' => 'required|max:10|unique:TBL_HBELI',
            'KODESPL' => 'required|max:10',
            'TGLBELI' => 'date|required',
        ]);
        Tbl_Hbeli::create($validatedDataHbeli);

        $validatedDataDbeli = $request->validate([
            'NOTRANSAKSI' => 'required|max:10',
            'KODEBRG' => 'required|max:10',
            'HARGABELI' => 'required',
            'QTY' => 'required',
            'DISKON' => 'required',
            'DISKONRP' => 'required',
            'TOTALRP' => 'required',
        ]);
        Tbl_Dbeli::create($validatedDataDbeli);

        $validatedDataStock = ([
            'KODEBRG' => $request->get('KODEBRG'),

            // 'KODEBRG' => 'max:10|unique:TBL_BARANG,KODEBRG',
            // 'QTYBELI' => 'unique:TBL_DBELI,QTY',
            'QTYBELI' => '' . $request->get('QTY'),

            // 'QTYBELI' => 'unique:TBL_DBELI,QTY',

        ]);
        Tbl_Stock::create($validatedDataStock);
        $validatedDataHutang = ([
            'NOTRANSAKSI' => $request->get('NOTRANSAKSI'),
            'KODESPL' => $request->get('KODESPL'),
            'TGLBELI' => $request->get('TGLBELI'),
            // 'TOTALHUTANG' => 'required|unique:TBL_DBELI,TOTALRP',
            'TOTALHUTANG' => $request->get('TOTALRP'),

        ]);
        Tbl_Hutang::create($validatedDataHutang);



        // dd($validatedDataHutang);

        return redirect('/dashboard/pembelian')->with('success', 'Pembelian berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tbl_hBeli = Tbl_Hbeli::find($id);
        $trans = $tbl_hBeli->NOTRANSAKSI;
        $tbl_DBeli = Tbl_Dbeli::where('NOTRANSAKSI', $trans)->first();

        // dd($tbl_DBeli);
        return view('dashboard.pembelian.edit', [
            'tbl_suplier' => Tbl_Suplier::all(),
            'tbl_barang' => Tbl_Barang::all(),
            'tbl_hrg' => Tbl_Barang::all(),
            'tbl_Hbeli' => $tbl_hBeli,
            'tbl_Dbeli' => $tbl_DBeli,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $tbl_hBeli = Tbl_Hbeli::find($id);
        $trans = $tbl_hBeli->NOTRANSAKSI;
        $tbl_DBeli = Tbl_Dbeli::where('NOTRANSAKSI', $trans)->first();



        $ruleshbeli = [
            'NOTRANSAKSI' => 'required|max:10',
            'KODESPL' => 'required|max:10',
            'TGLBELI' => 'date|required',
        ];
        $validatedDataHbeli = $request->validate($ruleshbeli);
        Tbl_Hbeli::where('id', $tbl_hBeli->id)->update($validatedDataHbeli);


        $rulesdbeli = [
            'KODEBRG' => 'required|max:10',
            'HARGABELI' => 'required',
            'QTY' => 'required',
            'DISKON' => 'required',
            'DISKONRP' => 'required',
            'TOTALRP' => 'required',
        ];
        $validatedDataHbeli = $request->validate($rulesdbeli);
        Tbl_Dbeli::where('NOTRANSAKSI', $tbl_DBeli->NOTRANSAKSI)->update($validatedDataHbeli);

        $rulesStock = [
            'KODEBRG' => $request->get('KODEBRG'),

            'QTYBELI' => '' . $request->get('QTY'),

        ];
        // $validatedDataStock = $request->validate($rulesStock);
        Tbl_Stock::where('KODEBRG', $tbl_DBeli->KODEBRG)->update($rulesStock);

        $rulesHutang = [
            'NOTRANSAKSI' => $request->get('NOTRANSAKSI'),
            'KODESPL' => $request->get('KODESPL'),
            'TGLBELI' => $request->get('TGLBELI'),
            // 'TOTALHUTANG' => 'required|unique:TBL_DBELI,TOTALRP',
            'TOTALHUTANG' => $request->get('TOTALRP'),

        ];
        // $validatedDataStock = $request->validate($rulesHutang);
        Tbl_Hutang::where('NOTRANSAKSI', $tbl_DBeli->NOTRANSAKSI)->update($rulesHutang);

        // if ($request->slug != $post->slug) {
        //     $rules['slug'] = 'required|unique:posts';
        // }


        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        // Post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/pembelian')->with('success', 'Pembelian berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tbl_hBeli = Tbl_Hbeli::find($id);
        $trans = $tbl_hBeli->NOTRANSAKSI;
        $tbl_DBeli = Tbl_Dbeli::where('NOTRANSAKSI', $trans)->first();
        $tbl_Stock = Tbl_Stock::where('KODEBRG', $tbl_DBeli->KODEBRG)->first();
        $tbl_Hutang = Tbl_Hutang::where('NOTRANSAKSI', $tbl_DBeli->NOTRANSAKSI)->first();
        // dd($tbl_Stock);
        // $tbl_hBeli::destroy($tbl_hBeli->id);
        // $tbl_DBeli::destroy($tbl_DBeli);
        // $tbl_DBeli::destroy($tbl_Stock);
        // $tbl_DBeli::destroy($tbl_Hutang);



        Tbl_Dbeli::destroy($tbl_DBeli->id);
        Tbl_Hbeli::destroy($tbl_hBeli->id);
        Tbl_Stock::destroy($tbl_Stock->KODEBRG);
        Tbl_Hutang::destroy($tbl_Hutang->id);


        // $tbl_Barang = Tbl_Barang::find($id);

        // Tbl_Barang::destroy($tbl_Barang->id);

        return redirect('/dashboard/pembelian')->with('success', 'Barang berhasil dihapus!');
    }
}
