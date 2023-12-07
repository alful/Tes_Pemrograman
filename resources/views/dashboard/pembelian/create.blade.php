@extends('layouts.maina')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Pembelian</h1>
    </div>

    <div class="col-lg-8">

        <form method="post" action="/dashboard/pembelian" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="NOTRANSAKSI" class="form-label">No Transaksi</label>
                <input type="text"
                    class="form-control @error('NOTRANSAKSI')
                    is-invalid
                @enderror"
                    id="NOTRANSAKSI" name="NOTRANSAKSI" required autofocus value="{{ $notr }}" readonly>
                @error('NOTRANSAKSI')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="KODESPL" class="form-label">Kode Suplier</label>

                <select class="form-select @error('KODESPL')
                is-invalid
            @enderror"
                    name="KODESPL">
                    <option selected>Pilih Kode Suplier</option>

                    @foreach ($tbl_suplier as $tbl_suplier)
                        @if (old('KODESPL') == $tbl_suplier->KODESPL)
                            <option value="{{ $tbl_suplier->KODESPL }}">{{ $tbl_suplier->KODESPL }}</option>
                        @else
                            <option value="{{ $tbl_suplier->KODESPL }}">{{ $tbl_suplier->KODESPL }}</option>
                        @endif
                    @endforeach
                    @error('KODESPL')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </select>
            </div>
            <div class="mb-3">
                <label for="TGLBELI" class="form-label">Tanggal Beli</label>
                <input type="date"
                    class="form-control @error('TGLBELI')
                    is-invalid
                @enderror"
                    id="TGLBELI" name="TGLBELI" required autofocus value="{{ old('TGLBELI') }}">
                @error('TGLBELI')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @error('KODEBRG')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="mb-3">
                <label for="KODEBRG" class="form-label">Kode Barang</label>
                <select class="form-select  @error('KODEBRG')
                is-invalid
            @enderror"
                    name="KODEBRG" id="KODEBRG" onchange="getHarga()">
                    <option selected>Pilih Kode Barang</option>
                    @foreach ($tbl_barang as $tbl_barang)
                        @if (old('KODEBRG') == $tbl_barang->id)
                            <option value="{{ $tbl_barang->KODEBRG }}">{{ $tbl_barang->KODEBRG }}
                                {{ $harga = $tbl_barang->HARGABELI }}</option>
                        @else
                            <option value="{{ $tbl_barang->KODEBRG }}">{{ $tbl_barang->KODEBRG }}
                                {{ $harga = $tbl_barang->HARGABELI }}
                            </option>
                        @endif
                    @endforeach
                </select>

                {{-- <div class="mb-3"> --}}
                {{-- <label for="HARGABELI" class="form-label">Harga Barang</label>
                <span id="hargainfo">

                    <select class="form-select" name="HARGABELI" id="HARGABELI">
                        @foreach ($tbl_hrg as $tbl_hrg)
                            @if (old('KODEBRG') == $tbl_hrg->KODEBRG)
                                <option value="{{ $tbl_hrg->KODEBRG }}" selected>{{ $tbl_hrg->HARGABELI }}
                                    {{ $harga = $tbl_hrg->HARGABELI }}</option>
                            @else
                                <option value="{{ $tbl_hrg->KODEBRG }}">{{ $tbl_hrg->HARGABELI }}
                                    {{ $harga = $tbl_hrg->HARGABELI }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </span> --}}
                {{-- <select class="form-select" name="KODEBRG">
                    @foreach ($tbl_hrg as $tbl_hrg)
                        @if (old('KODEBRG') == $tbl_hrg->id)
                            <option value="{{ $tbl_hrg->id }}" selected>{{ $tbl_hrg->KODEBRG }}
                                {{ $tbl_hrg->HARGABELI }}</option>
                        @else
                            <option value="{{ $tbl_hrg->id }}">{{ $tbl_hrg->KODEBRG }} {{ $tbl_hrg->HARGABELI }}
                            </option>
                        @endif
                    @endforeach
                </select> --}}
                {{-- </div> --}}

                <div class="mb-3">
                    <label for="HARGABELI" class="form-label">Harga Beli</label>
                    <span id="hargainfo">
                        <input type="number"
                            class="form-control @error('HARGABELI')
                    is-invalid
                @enderror"
                            id="HARGABELI" name="HARGABELI" required autofocus value="{{ old('HARGABELI') }}" readonly>
                        @error('HARGABELI')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="QTY" class="form-label">Jumlah</label>
                    <input type="number"
                        class="form-control @error('QTY')
                        is-invalid
                    @enderror"
                        id="QTY" name="QTY" required autofocus value="{{ old('QTY') }}"
                        onchange="getTotalrp()">
                    @error('QTY')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="DISKON" class="form-label">Diskon</label>
                    <input type="number"
                        class="form-control @error('DISKON')
                        is-invalid
                    @enderror"
                        id="DISKON" name="DISKON" required autofocus value="{{ old('DISKON') }}" onchange="diskonRP()">
                    @error('DISKON')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="DISKONRP" class="form-label">Diskon Rp</label>
                    <span id="diskonRP">
                        <input type="number"
                            class="form-control @error('DISKONRP')
                        is-invalid
                    @enderror"
                            id="DISKONRP" name="DISKONRP" required autofocus value="{{ old('DISKONRP') }}" readonly
                            step="0.01">
                    </span>
                    @error('DISKONRP')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="TOTALRP" class="form-label">Total Rp</label>
                    <span id="totalRp">
                        <input type="number"
                            class="form-control @error('TOTALRP')
                        is-invalid
                    @enderror"
                            id="TOTALRP" name="TOTALRP" required autofocus value="{{ old('TOTALRP') }}">
                    </span>
                    @error('TOTALRP')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create Pembelian</button>
        </form>



    </div>
    <script>
        function getHarga() {
            // document.querySelector("#hargainfo option").value = value;
            // alert(value.options[value.selectedIndex].text);

            // var selectElement = event.target;

            //     // var value = selectElement.value;
            //     var value = (a.value || a.options[a.selectedIndex].value); //crossbrowser solution =)

            //     document.querySelector("#hargainfo input").value = value;
            var sel = document.getElementById("KODEBRG");
            var text = sel.options[sel.selectedIndex].text;
            const myArray = text.split(" ");
            text = myArray[1];
            document.querySelector("#hargainfo input").value = text;

        }

        function getQTY(value) {
            // document.querySelector("#hargainfo input").value = value;

        }

        function diskonRP(value) {
            var diskon = document.getElementById("DISKON").value;
            var totalrp = document.getElementById("TOTALRP").value;
            var tot = (diskon * totalrp) / 100;
            document.querySelector("#diskonRP input").value = tot;

        }

        function getTotalrp(value) {
            var qty = document.getElementById("QTY").value;
            var harga = document.getElementById("HARGABELI").value;
            // var qtyq = parseInt(qty);
            // var hargaq = parseInt(harga);
            document.querySelector("#totalRp input").value = qty * harga;

        }
    </script>
@endsection
