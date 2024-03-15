@extends('layouts.master')

    @section('content')
        <div class="container">
            <h1>Edit Data</h1>

            <form action="/warga/store" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Angga Maulana" value="{{ $warga->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik" placeholder="331************" value="{{ $warga->nik }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_kk" class="form-label">NO KK</label>
                    <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="01" value="{{ $warga->no_kk }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_kk" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" @if($warga->jenis_kelamin == 'L') selected @endif >Laki-laki</option>
                        <option value="P" @if($warga->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat" required>{{ $warga->alamat }}</textarea>
                  </div>
                <input type="submit" value="Simpan" class="btn btn-info"></input>
                <a href="/warga" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    @endsection