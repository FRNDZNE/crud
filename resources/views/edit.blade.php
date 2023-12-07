@extends('layouts.template')
@section('title','Edit Film')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Film</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('film.update',$data->id) }}" method="post" id="form-update">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" name="judul" id="judul" placeholder="Masukan Judul" class="form-control" value="{{ $data->judul }}">
                                        @error('judul')
                                        <small style="color:red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <input type="number" name="rating" id="rating" placeholder="Masukan Rating" class="form-control" step="any" min="0" value="{{ $data->rating }}">
                                        @error('rating')
                                        <small style="color:red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="usia">Rentang Usia</label>
                                        <input type="text" name="usia" id="usia" placeholder="Masukan Rentang Usia" class="form-control" value="{{ $data->usia }}">
                                        @error('usia')
                                        <small style="color:red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rilis">Tanggal Rilis</label>
                                        <input type="date" name="rilis" id="rilis" class="form-control" value="{{ $data->rilis }}">
                                        @error('rilis')
                                        <small style="color:red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="region">Region</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="region" value="n" id="n" class="form-check-input" @if($data->region == 'n') checked @endif>
                                                    <label for="n" class="form-check-label">Nasional</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" name="region" value="i" id="i" class="form-check-input" @if($data->region == 'i') checked @endif>
                                                    <label for="i" class="form-check-label">Internasional</label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('region')
                                            <small style="color:red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>                        
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('film.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="javascript:void(0)" onclick="document.getElementById('form-update').submit();" class="btn btn-warning">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection