@extends('layouts.template')
@section('title','Tambah Film')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h5>Data Film</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($data as $d)
                            <div class="col-md-3">
                                <div class="card mb-3 mt-3">
                                    <div class="card-header">
                                        <h5>{{ $d->judul }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><b>Rating : </b>{{ $d->rating }}</p>
                                        <p><b>Usia : </b>{{ $d->usia }}</p>
                                        <p><b>Tanggal Rilis :</b>{{ $d->rilis }}</p>
                                        <p><b>Region : </b>{{ $d->region == 'n' ? 'Nasional' : 'Internasional' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection