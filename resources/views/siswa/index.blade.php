@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Siswa') }}</div>

                <div class="card-body">
                    <div class="mt-4">
                        <a href="/siswa/create" class="btn btn-primary">Tambah Siswa</a>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <td>NO</td>
                            <td>NIS</td>
                            <td>Nama</td>
                            <td>Kelas</td>
                            <td>Jurusan</td>
                            <td>Jenis Kelamin</td>
                            <td>Alamat</td>
                            <td>Foto</td>
                            <td>Aksi</td>
                        </tr>
                        @foreach($siswa as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nis }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->class }}</td>
                            <td>{{ $data->major }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>{{ $data->address }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $data->foto) }}" alt="" class="card-img-top mt-3" style="max-height: 120px; max-width: 120px; overflow:hidden">
                            </td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="/siswa/{{ $data->id }}/edit" class="btn btn-warning" style="margin-right: 10px;">Edit</a>
                                    <form action="/siswa/{{ $data->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" name="submit" class="btn btn-danger" onclick="return confirm('Yakin inin menghapus data?')">Hapus</button>
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


