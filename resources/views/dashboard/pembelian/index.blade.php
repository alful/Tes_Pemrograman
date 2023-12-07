@extends('layouts.maina')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pembelian</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-10">
        <a href="/dashboard/pembelian/create" class="btn btn-primary mb-3">Create new pembelian</a>
        <table class="table table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Transaksi</th>
                    <th scope="col">Kode Suplier</th>
                    <th scope="col">Tanggal Pembelian</th>
                    {{-- <th scope="col">Category</th> --}}
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tbl_hbeli as $tbl_hbeli)
                    <tr>
                        <td>{{ $loop->iteration }} </td>
                        {{-- <td>{{ $post->title }}</td> --}}
                        <td>{{ $tbl_hbeli->NOTRANSAKSI }}</td>
                        <td>{{ $tbl_hbeli->KODESPL }}</td>
                        <td>{{ $tbl_hbeli->TGLBELI }}</td>

                        <td>
                            <a href="/dashboard/pembelian/{{ $tbl_hbeli->id }}" class="badge bg-info">
                                <span data-feather="eye"></span>
                            </a>
                            <a href="/dashboard/pembelian/{{ $tbl_hbeli->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                            <form action="/dashboard/pembelian/{{ $tbl_hbeli->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
