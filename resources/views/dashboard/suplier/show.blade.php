@extends('layouts.maina')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class=" mb-3">{{ $tbl_Suplier->NAMASPL }}</h1>

                <a href="/dashboard/suplier" class="btn btn-success"><span data-feather="arrow-left"></span> Back to
                    suplier</a>
                <a href="/dashboard/suplier/{{ $tbl_Suplier->id }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span>
                    Edit</a>

                <form action="/dashboard/suplier/{{ $tbl_Suplier->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        <span data-feather="x-circle"></span> Delete
                    </button>
                </form>

                {{-- {{$post->body}} --}}

                {{-- untuk menghilangkan tag html --}}

            </div>
        </div>
    </div>
@endsection
