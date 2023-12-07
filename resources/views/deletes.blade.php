@extends('layouts.template')
@section('title','Film')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Film Terhapus</h5>
                    </div>
                    <div class="card-body">
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Region</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $film)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $film->judul }}</td>
                                    <td>
                                        {{ $film->region == 'i' ? 'Internasional' : 'Nasional'; }}
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRestore-{{ $film->id }}">
                                          Restore
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalRestore-{{ $film->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Ingin Me-restore Film {{ $film->judul }} ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('film.restore', $film->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Restore</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalForce-{{ $film->id }}">
                                          Hapus Permanen
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalForce-{{ $film->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Ingin Menghapus Permanen Film {{ $film->judul }} ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('film.force', $film->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-dark">Hapus Permanen</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td scope="row" colspan="4">Film Tidak Tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection