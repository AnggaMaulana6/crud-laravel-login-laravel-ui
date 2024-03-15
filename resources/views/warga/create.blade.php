@extends('layouts.master')

    @section('content')
        <div class="container">
            <h1>Create Data</h1>

            <form action="/warga/store" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Angga Maulana" required>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik" placeholder="331************" required>
                </div>
                <div class="mb-3">
                    <label for="no_kk" class="form-label">NO KK</label>
                    <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="01" required>
                </div>
                <div class="mb-3">
                    <label for="no_kk" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                  </div>
                <input type="submit" value="Simpan" class="btn btn-info"></input>
                <a href="/warga" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    @endsection