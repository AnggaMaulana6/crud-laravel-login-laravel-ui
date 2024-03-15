@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Warga') }}</div>

                <div class="card-body">
                    <div class="mt-4">
                        <a href="/warga/create" class="btn btn-primary">Tambah Warga</a>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <td>NO</td>
                            <td>NAMA</td>
                            <td>NIK</td>
                            <td>NO KK</td>
                            <td>JENIS KELAMIN</td>
                            <td>ALAMAT</td>
                            <td>AKSI</td>
                        </tr>
                        @foreach($warga as $w)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $w->nama }}</td>
                            <td>{{ $w->nik }}</td>
                            <td>{{ $w->no_kk }}</td>
                            <td>{{ $w->jenis_kelamin }}</td>
                            <td>{{ $w->alamat }}</td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="/warga/{{ $w->id }}/edit" class="btn btn-warning" style="margin-right: 10px;">Edit</a>
                                    <form action="/warga/{{ $w->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" name="submit" class="btn btn-warning">Hapus</button>
                                    </form>
                                </div>  
                            </td>
                                                      
                        </tr>
                        @endforeach
                    </table>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


