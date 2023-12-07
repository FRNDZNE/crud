@extends('layouts.template')
@section('title', $data->judul)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $data->judul }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6>Judul</h6>
                                <p>{{ $data->judul }}</p>     
                            </div>    
                            <div class="col-md-4">
                                <h6>Rating</h6>
                                <p>{{ $data->rating }}</p>     
                            </div>    
                            <div class="col-md-4">
                                <h6>Rentang Usia</h6>
                                <p>{{ $data->usia }}</p>     
                            </div>    
                        </div>        
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Tanggal Rilis</h6>
                                <p>{{ $data->rilis }}</p>     
                            </div>    
                            <div class="col-md-6">
                                <h6>Region</h6>
                                <p>{{ $data->region == 'i' ? 'Internasional' : 'Nasional' }}</p>     
                            </div>        
                        </div>     
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('film.index') }}" class="btn btn-dark">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection